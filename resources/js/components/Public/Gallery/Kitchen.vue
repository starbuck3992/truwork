<template>
 <!-- Hero section -->
      <div class="relative pb-4">
        <!-- Background image and overlap -->
        <div aria-hidden="true" class="hidden absolute inset-0 sm:flex sm:flex-col">
          <div class="flex-1 relative w-full bg-gray-800">
            <div class="absolute inset-0 overflow-hidden">
              <img src="https://default-space-bucket.fra1.cdn.digitaloceanspaces.com/truwork/kitchen1.jpg" alt="" class="w-full h-full object-center object-cover">
            </div>
            <div class="absolute inset-0 bg-gray-900 opacity-80"></div>
          </div>
          <div class="w-full bg-white h-32 md:h-40 lg:h-48"></div>
        </div>

        <div class="relative max-w-3xl mx-auto pb-96 px-4 text-center sm:pb-0 sm:px-6 lg:px-8">
          <!-- Background image and overlap -->
          <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
            <div class="flex-1 relative w-full bg-gray-800">
              <div class="absolute inset-0 overflow-hidden">
                <img src="https://default-space-bucket.fra1.cdn.digitaloceanspaces.com/truwork/kitchen1.jpg" alt="" class="w-full h-full object-center object-cover">
              </div>
              <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
            </div>
            <div class="w-full bg-white h-48"></div>
          </div>
          <div class="relative py-20">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">Kuchyně na míru</h1>
          </div>
        </div>

        <section aria-labelledby="collection-heading" class="-mt-96 relative sm:mt-0">
          <div class="max-w-md mx-auto grid grid-cols-1 gap-y-6 px-4 sm:max-w-full sm:px-6 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:px-8 lg:gap-x-8">

              <router-link :to="{ name: 'galleriesIndex', query:{ category: 'kuchyne_klasicke' } }" class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
                <div>
                  <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                      <img src="https://default-space-bucket.fra1.cdn.digitaloceanspaces.com/truwork/kitchen1.jpg" alt="Woman wearing a comfortable cotton t-shirt." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-20"></div>
                  </div>
                  <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                    <div>
                      <p aria-hidden="true" class="font-semibold text-white text-4xl">
                        Klasické
                      </p>
                      <p class="mt-1 text-white text-xl">
                        <a href="#">
                          <span class="absolute inset-0"></span>
                          Pokračovat na galerii
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </router-link>

              <router-link :to="{ name: 'galleriesIndex', query:{ category: 'kuchyne_moderni' } }" class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
                <div>
                  <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                      <img src="https://default-space-bucket.fra1.cdn.digitaloceanspaces.com/truwork/modern.jpg" alt="Man wearing a comfortable and casual cotton t-shirt." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-20"></div>
                  </div>
                  <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                    <div>
                      <p aria-hidden="true" class="font-semibold text-white text-4xl">
                        Moderní
                      </p>
                      <p class="mt-1 text-white text-xl">
                        <a href="#">
                          <span class="absolute inset-0"></span>
                          Pokračovat na galerii
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </router-link>

              <router-link :to="{ name: 'galleriesIndex', query:{ category: 'kuchyne_bezuchytkove' } }" class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
                <div>
                  <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                      <img src="https://default-space-bucket.fra1.cdn.digitaloceanspaces.com/truwork/kitchen3.jpg" alt="Person sitting at a wooden desk with paper note organizer, pencil and tablet." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-20"></div>
                  </div>
                  <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                    <div>
                      <p aria-hidden="true" class="font-semibold text-white text-4xl">
                        Bezúchytkové
                      </p>
                      <p class="mt-1 text-white text-xl">
                        <a href="#">
                          <span class="absolute inset-0"></span>
                          Pokračovat na galerii
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </router-link>

          </div>
        </section>
      </div>
</template>
