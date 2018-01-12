#
# This is an example VCL file for Varnish.
#
# It does not do anything by default, delegating control to the
# builtin VCL. The builtin VCL is called when there is no explicit
# return statement.
#
# See the VCL chapters in the Users Guide at https://www.varnish-cache.org/docs/
# and https://www.varnish-cache.org/trac/wiki/VCLExamples for more examples.

# Marker to tell the VCL compiler that this VCL has been adapted to the
# new 4.0 format.
vcl 4.0;

import cookie;
import querystring;

# Default backend definition. Set this to point to your content server.
backend default {
    .host = "127.0.0.1";
    .port = "8080";
}

sub vcl_recv {
    # Happens before we check if we have this in cache already.
    #
    # Typically you clean up the request here, removing cookies you don't need,
    # rewriting the request, etc.

    # We don't use querystrings anywhere in the application, so let's get rid of it
    set req.url = querystring.remove(req.url);

	# Normalize the header, remove the port (in case you're testing this on various TCP ports)
	set req.http.Host = regsub(req.http.Host, ":[0-9]+", "");

	if (req.http.cookie) {
        cookie.parse(req.http.cookie);

        # filter everything but the session cookie
        cookie.filter_except("matcha_session");

		# Cache all pages which don't contain user data
		if (req.url == "/"
			|| req.url ~ "^/club[/]{0,1}$"
			|| req.url ~ "^/hotel[/]{0,1}(welcome|tour|furniture|pets|homes|web|games|badges|team){0,1}[/]{0,1}$"
			|| req.url ~ "^/footer_pages/(privacy_policy|terms_and_conditions)[/]{0,1}$"
		) {
			cookie.delete("matcha_session");
		}

        # Store it back into req so it will be passed to the backend.
        set req.http.cookie = cookie.get_string();

        # If empty, unset so the builtin VCL can consider it for caching.
        if (req.http.cookie == "") {
            unset req.http.cookie;
        }	
	}
}

sub vcl_backend_response {
    # Happens after we have read the response headers from the backend.
    #
    # Here you clean the response headers, removing silly Set-Cookie headers
    # and other mistakes your backend does.

    # Cache all pages which don't contain user data
	if (bereq.url == "/"
		|| bereq.url ~ "^/club[/]{0,1}$"
		|| bereq.url ~ "^/hotel[/]{0,1}(welcome|tour|furniture|pets|homes|web|games|badges|team){0,1}[/]{0,1}$"
		|| bereq.url ~ "^/footer_pages/(privacy_policy|terms_and_conditions)[/]{0,1}$"
	) {
		unset beresp.http.Set-Cookie;
    }

	# Sometimes, a 301 or 302 redirect formed via Apache's mod_rewrite can mess with the HTTP port that is being passed along.
	# This often happens with simple rewrite rules in a scenario where Varnish runs on :80 and Apache on :8080 on the same box.
	# A redirect can then often redirect the end-user to a URL on :8080, where it should be :80.
	# This may need finetuning on your setup.
	#
	# To prevent accidental replace, we only filter the 301/302 redirects for now.
	if (beresp.status == 301 || beresp.status == 302) {
		set beresp.http.Location = regsub(beresp.http.Location, ":[0-9]+", "");
	}
}

sub vcl_deliver {
    # Happens when we have all the pieces we need, and are about to send the
    # response to the client.
    #
    # You can do accounting or modifying the final object here.
}
