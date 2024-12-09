const cacheName = "v2";

const cacheAssets = [
  "./Pages/index.php", // Ensure the path is correct
  "/Pages/products.php", // Ensure the path is correct
  "/Pages/about_us.php", // Ensure the path is correct
  "/assets/js/main.js",  // Ensure the file exists and the path is correct
  "/assets/css/style.css", // Ensure the file exists and the path is correct
];

// Install event
self.addEventListener("install", (e) => {
  console.log("Service Worker: Installed");

  e.waitUntil(
    caches
      .open(cacheName)
      .then((cache) => {
        console.log("Service Worker: Caching files");
        return cache.addAll(cacheAssets);
      })
      .catch((err) => {
        console.error("Service Worker: Caching failed", err);
      })
      .then(() => self.skipWaiting())
  );
});

// Activate event
self.addEventListener("activate", (e) => {
  console.log("Service Worker: Activated");

  // Remove old caches
  e.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cache) => {
          if (cache !== cacheName) {
            console.log(`Service Worker: Deleting cache ${cache}`);
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Fetch event
self.addEventListener("fetch", (e) => {
  console.log(`Service Worker: Fetching ${e.request.url}`);
  e.respondWith(
    fetch(e.request)
      .then((response) => {
        // Optionally add fetched items to the cache
        const clone = response.clone();
        caches.open(cacheName).then((cache) => cache.put(e.request, clone));
        return response;
      })
      .catch(() => caches.match(e.request))
  );
});
