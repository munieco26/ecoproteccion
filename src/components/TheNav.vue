<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Motion } from 'motion-v'

const scrolled = ref(false)
const menuOpen = ref(false)

const links = [
  { href: '#tanques',     label: 'Tanques' },
  { href: '#desinfeccion', label: 'Desinfección' },
  { href: '#mip',          label: 'MIP' },
  { href: '#nosotros',     label: 'Nosotros' },
  { href: '#contacto',     label: 'Contacto' },
]

function onScroll() { scrolled.value = window.scrollY > 24 }
onMounted(() => {
  window.addEventListener('scroll', onScroll, { passive: true })
  onScroll()
})
onUnmounted(() => window.removeEventListener('scroll', onScroll))

function go(href) {
  menuOpen.value = false
  document.querySelector(href)?.scrollIntoView({ behavior: 'smooth' })
}
</script>

<template>
  <Motion
    as="header"
    class="nav"
    :class="{ 'nav--scrolled': scrolled, 'nav--open': menuOpen }"
    :initial="{ y: -40, opacity: 0 }"
    :animate="{ y: 0, opacity: 1 }"
    :transition="{ duration: 0.7, delay: 0.1, ease: [0.2, 0.7, 0.2, 1] }"
  >
    <div class="nav__inner container">
      <a href="#top" class="nav__brand" @click.prevent="go('#top')">
        <img src="/assets/logo.png" alt="Ecoprotección" />
      </a>

      <nav class="nav__links" :class="{ 'nav__links--open': menuOpen }">
        <a
          v-for="l in links"
          :key="l.href"
          :href="l.href"
          class="nav__link"
          @click.prevent="go(l.href)"
        >{{ l.label }}</a>
      </nav>

      <a
        href="https://wa.me/5491165029146"
        target="_blank"
        rel="noopener"
        class="nav__cta"
      >
        <span class="mi">phone_in_talk</span>
        <span>11 6502-9146</span>
      </a>

      <button
        class="nav__burger"
        :aria-expanded="menuOpen"
        aria-label="Menu"
        @click="menuOpen = !menuOpen"
      >
        <span class="mi">{{ menuOpen ? 'close' : 'menu' }}</span>
      </button>
    </div>
  </Motion>
</template>

<style scoped>
.nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 50;
  padding: 0.875rem 0;
  transition: background 0.35s ease, box-shadow 0.35s ease, padding 0.35s ease;
  background: transparent;
}
.nav--scrolled {
  background: rgba(247, 244, 236, 0.82);
  backdrop-filter: blur(14px) saturate(140%);
  box-shadow: 0 1px 0 var(--eco-line), 0 12px 28px -22px rgba(11, 20, 16, 0.2);
  padding: 0.5rem 0;
}

.nav__inner {
  display: flex;
  align-items: center;
  gap: 1.5rem;
}

.nav__brand { display: block; flex-shrink: 0; }
.nav__brand img { height: 60px; width: auto; }

.nav__links {
  display: flex;
  align-items: center;
  gap: 0.4rem;
  margin-left: auto;
  margin-right: 1.5rem;
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: 999px;
  padding: 0.35rem;
  box-shadow: var(--shadow-soft);
}

.nav__link {
  display: inline-flex;
  align-items: center;
  padding: 0.55rem 1rem;
  font-family: var(--font-body);
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--eco-graphite);
  border-radius: 999px;
  transition: color 0.25s, background 0.25s;
}
.nav__link:hover {
  color: var(--eco-ink);
  background: var(--eco-fog);
}

.nav__cta {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.65rem 1.1rem;
  background: var(--eco-ink);
  color: var(--eco-bone);
  font-family: var(--font-body);
  font-size: 0.875rem;
  font-weight: 600;
  border-radius: 999px;
  transition: transform 0.25s, background 0.25s;
  flex-shrink: 0;
}
.nav__cta:hover {
  background: var(--eco-forest);
  transform: translateY(-2px);
}
.nav__cta .mi { font-size: 1.05rem; }

.nav__burger {
  display: none;
  width: 44px;
  height: 44px;
  align-items: center;
  justify-content: center;
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: 14px;
  color: var(--eco-ink);
}

@media (max-width: 980px) {
  .nav__links {
    position: fixed;
    inset: 76px var(--gutter) auto var(--gutter);
    flex-direction: column;
    align-items: stretch;
    gap: 0.4rem;
    margin: 0;
    border-radius: var(--r-md);
    padding: 0.8rem;
    transform: translateY(-12px);
    opacity: 0;
    pointer-events: none;
    transition: transform 0.3s, opacity 0.3s;
  }
  .nav__links--open {
    transform: translateY(0);
    opacity: 1;
    pointer-events: auto;
  }
  .nav__link {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--eco-ink);
    justify-content: space-between;
    padding: 0.9rem 1rem;
    border-radius: 14px;
  }
  .nav__link:hover { background: var(--eco-fog); }
  .nav__burger { display: inline-flex; margin-left: auto; }
  .nav__cta { display: none; }
}
</style>
