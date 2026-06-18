<script setup>
import TheNav from './components/TheNav.vue'
import HeroSection from './components/HeroSection.vue'
import TanqueSection from './components/TanqueSection.vue'
import DesinfeccionSection from './components/DesinfeccionSection.vue'
import MIPSection from './components/MIPSection.vue'
import NosotrosSection from './components/NosotrosSection.vue'
import ContactoSection from './components/ContactoSection.vue'
import SiteFooter from './components/SiteFooter.vue'
import FloatingWA from './components/FloatingWA.vue'
</script>

<template>
  <TheNav />
  <main>
    <HeroSection />
    <TanqueSection />
    <DesinfeccionSection />
    <MIPSection />
    <NosotrosSection />
    <ContactoSection />
  </main>
  <SiteFooter />
  <FloatingWA />
</template>

<style>
main { display: block; }
</style>
