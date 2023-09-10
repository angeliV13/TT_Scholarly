self.addEventListener("install",  e => {
    e.waitUntil(
        caches.open("static").then((cache) => {
          return cache.addAll([
            "./",
            "./src/master.css",
            "./images/logo192.png",
            "./images/logo512.png",
          ]);
        })
    );
});
self.addEventListener("fetch", e => {
  e.respondWith(
    (async function () {
      try {
        var res = await fetch(e.request);
        var cache = await caches.open("cache");
        cache.put(e.request.url, res.clone());
        return res;
      } catch (error) {
        return caches.match(encodeURI.request);
      }
    })()
  );
});