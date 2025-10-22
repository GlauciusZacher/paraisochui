((g) => {
  var h,
    a,
    k,
    p = "The Google Maps JavaScript API",
    c = "google",
    l = "importLibrary",
    q = "__ib__",
    m = document,
    b = window;
  b = b[c] || (b[c] = {});
  var d = b.maps || (b.maps = {}),
    r = new Set(),
    e = new URLSearchParams(),
    u = () =>
      h ||
      (h = new Promise(async (f, n) => {
        await (a = m.createElement("script"));
        e.set("libraries", [...r] + "");
        for (k in g)
          e.set(
            k.replace(/[A-Z]/g, (t) => "_" + t[0].toLowerCase()),
            g[k]
          );
        e.set("callback", c + ".maps." + q);

        // Define a Trusted Type policy if Trusted Types are supported
        if (window.trustedTypes && trustedTypes.createPolicy) {
          const policy = trustedTypes.createPolicy("google-maps-api", {
            createScriptURL: (url) => {
              // Ensure the URL is for the Google Maps API before allowing
              if (url.startsWith(`https://maps.${c}apis.com/maps/api/js?`)) {
                return url;
              }
              throw new Error("Invalid script URL for Google Maps API");
            },
          });
          // Use the policy to create a TrustedScriptURL
          a.src = policy.createScriptURL(`https://maps.${c}apis.com/maps/api/js?` + e);
        } else {
          // Fallback for browsers without Trusted Types or when not enabled
          a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
        }

        d[q] = f;
        a.onerror = () => (h = n(Error(p + " could not load.")));
        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
        m.head.append(a);
      }));
  d[l] ? console.warn(p + " only loads once. Ignoring:", g) : (d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)));
})({
  key: "AIzaSyCgVE4Un5QiyJVYdzUQRIni0_UpejgrFTg",
  v: "weekly",
  region: "UY",
  language: "es-419",

  // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
  // Add other bootstrap parameters as needed, using camel case.
});
