<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Motion } from 'motion-v'

const scrolled = ref(false)
const menuOpen = ref(false)

const links = [
  { href: '#tanques', label: 'Tanques', n: '01' },
  { href: '#desinfeccion', label: 'Desinfección', n: '02' },
  { href: '#mip', label: 'MIP', n: '03' },
  { href: '#nosotros', label: 'Nosotros', n: '04' },
  { href: '#contacto', label: 'Contacto', n: '05' },
]

function onScroll() {
  scrolled.value = window.scrollY > 24
}

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
    :class="{ 'nav--scrolled': scrolled }"
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
          v-for="(l, i) in links"
          :key="l.href"
          :href="l.href"
          class="nav__link"
          @click.prevent="go(l.href)"
        >
          <span class="nav__link-num">{{ l.n }}</span>
          <span class="nav__link-label">{{ l.label }}</span>
        </a>
      </nav>

      <a href="https://wa.me/5491165029146" target="_blank" rel="noopener" class="nav__cta">
        <span class="mi">phone_in_talk</span>
        <span>11 6502-9146</span>
      </a>

      <button class="nav__burger" :aria-expanded="menuOpen" aria-label="Menu" @click="menuOpen = !menuOpen">
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
  transition: all 0.4s ease;
  background: linear-gradient(180deg, rgba(5, 8, 5, 0.85), rgba(5, 8, 5, 0));
  backdrop-filter: blur(0);
}
.nav--scrolled {
  background: rgba(5, 8, 5, 0.78);
  backdrop-filter: blur(14px) saturate(140%);
  border-bottom: 1px solid rgba(126, 211, 33, 0.18);
  padding: 0.625rem 0;
}

.nav__inner {
  display: flex;
  align-items: center;
  gap: 1.5rem;
}

.nav__brand {
  display: block;
  flex-shrink: 0;
}
.nav__brand img {
  height: 38px;
  width: auto;
}

.nav__links {
  display: flex;
  align-items: center;
  gap: 1.25rem;
  margin-left: auto;
  margin-right: 1.5rem;
}

.nav__link {
  display: inline-flex;
  align-items: baseline;
  gap: 0.4rem;
  font-family: var(--font-body);
  font-size: 0.875rem;
  font-weight: 500;
  letter-spacing: 0.01em;
  color: var(--eco-cream);
  position: relative;
  padding: 0.25rem 0;
  transition: color 0.25s;
}
.nav__link:hover { color: var(--eco-lime-glow); }
.nav__link-num {
  font-family: var(--font-mono);
  font-size: 0.625rem;
  color: var(--eco-lime);
  opacity: 0.6;
}
.nav__link::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -4px;
  height: 1px;
  width: 0;
  background: var(--eco-lime);
  transition: width 0.3s;
}
.nav__link:hover::after { width: 100%; }

.nav__cta {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.625rem 1rem;
  background: var(--eco-lime);
  color: var(--eco-ink);
  font-family: var(--font-mono);
  font-size: 0.8125rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  border: 1px solid var(--eco-lime);
  transition: all 0.2s;
  flex-shrink: 0;
}
.nav__cta:hover {
  background: transparent;
  color: var(--eco-lime);
  box-shadow: 0 0 24px rgba(126, 211, 33, 0.35);
}
.nav__cta .mi { font-size: 1.05rem; }

.nav__burger {
  display: none;
  width: 44px;
  height: 44px;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(244, 241, 232, 0.2);
}

@media (max-width: 880px) {
  .nav__links {
    position: fixed;
    inset: 64px 0 0 0;
    background: var(--eco-ink);
    flex-direction: column;
    align-items: flex-start;
    padding: 2rem var(--gutter);
    gap: 1.25rem;
    margin: 0;
    transform: translateX(100%);
    transition: transform 0.4s ease;
    border-top: 1px solid rgba(126, 211, 33, 0.18);
  }
  .nav__links--open { transform: translateX(0); }
  .nav__link { font-size: 1.5rem; font-family: var(--font-display); text-transform: uppercase; letter-spacing: 0.02em; }
  .nav__burger { display: inline-flex; margin-left: auto; }
  .nav__cta { display: none; }
}
</style>
