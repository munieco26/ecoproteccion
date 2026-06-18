<script setup>
import { Motion } from 'motion-v'

const stats = [
  { v: '15+', l: 'años cubriendo el AMBA' },
  { v: '730 / 988', l: 'registros oficiales' },
  { v: '24h', l: 'respuesta promedio' },
]

const reel = [
  { src: '/assets/photos/fumigacion-club.png', act: 'ACTO 02', title: 'Desinfección · Club Mapuche' },
  { src: '/assets/photos/fumigacion-jardin.png', act: 'ACTO 03', title: 'Fumigación · Jardín Privado' },
  { src: '/assets/photos/fumigacion-patio.png', act: 'ACTO 04', title: 'Espacios comunes · Patio' },
]
</script>

<template>
  <section id="top" class="hero">
    <!-- Background grid + glow -->
    <div class="hero__grid" aria-hidden="true"></div>
    <div class="hero__glow" aria-hidden="true"></div>

    <!-- Top utility strip -->
    <Motion
      class="hero__strip"
      :initial="{ opacity: 0 }"
      :animate="{ opacity: 1 }"
      :transition="{ duration: 1, delay: 0.6 }"
    >
      <div class="container hero__strip-inner">
        <span class="mono">SENASA · 730</span>
        <span class="mono">ANMAT · 988</span>
        <span class="mono dot">●</span>
        <span class="mono">BUENOS AIRES · AMBA</span>
        <span class="mono dot">●</span>
        <span class="mono">EST. 2009</span>
      </div>
    </Motion>

    <div class="hero__main container">
      <div class="hero__copy">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ opacity: 0, x: -20 }"
          :animate="{ opacity: 1, x: 0 }"
          :transition="{ duration: 0.6, delay: 0.3 }"
        >
          CAPÍTULO 00 — INTRODUCCIÓN
        </Motion>

        <h1 class="hero__title display">
          <span class="line-mask">
            <Motion
              as="span"
              class="line"
              :initial="{ y: '105%' }"
              :animate="{ y: 0 }"
              :transition="{ duration: 0.9, delay: 0.4, ease: [0.16, 1, 0.3, 1] }"
            >Protección</Motion>
          </span>
          <span class="line-mask">
            <Motion
              as="span"
              class="line line--accent"
              :initial="{ y: '105%' }"
              :animate="{ y: 0 }"
              :transition="{ duration: 0.9, delay: 0.55, ease: [0.16, 1, 0.3, 1] }"
            >integral.</Motion>
          </span>
          <span class="line-mask line-mask--small">
            <Motion
              as="span"
              class="line line--small"
              :initial="{ y: '110%', opacity: 0 }"
              :animate="{ y: 0, opacity: 1 }"
              :transition="{ duration: 0.9, delay: 0.7, ease: [0.16, 1, 0.3, 1] }"
            >del tanque al jardín.</Motion>
          </span>
        </h1>

        <Motion
          as="p"
          class="hero__lede body-lg"
          :initial="{ opacity: 0, y: 20 }"
          :animate="{ opacity: 1, y: 0 }"
          :transition="{ duration: 0.7, delay: 0.9 }"
        >
          Control de plagas, desinfección y limpieza de tanques de agua potable. Productos
          de baja toxicidad aprobados por SENASA y ANMAT. Atención personalizada en
          hogares, consorcios, hospitales, hoteles, oficinas y countries.
        </Motion>

        <Motion
          class="hero__ctas"
          :initial="{ opacity: 0, y: 20 }"
          :animate="{ opacity: 1, y: 0 }"
          :transition="{ duration: 0.7, delay: 1.05 }"
        >
          <a href="#contacto" class="btn btn--primary">
            Pedir presupuesto
            <span class="mi">arrow_outward</span>
          </a>
          <a href="https://wa.me/5491165029146" target="_blank" rel="noopener" class="btn btn--ghost">
            <span class="mi mi-out">forum</span>
            WhatsApp 11 6502-9146
          </a>
        </Motion>

        <Motion
          class="hero__stats"
          :initial="{ opacity: 0 }"
          :animate="{ opacity: 1 }"
          :transition="{ duration: 0.8, delay: 1.3 }"
        >
          <div v-for="s in stats" :key="s.v" class="stat">
            <div class="stat__v display">{{ s.v }}</div>
            <div class="stat__l mono">{{ s.l }}</div>
          </div>
        </Motion>
      </div>

      <div class="hero__reel">
        <Motion
          v-for="(r, i) in reel"
          :key="r.src"
          class="reel-card"
          :class="`reel-card--${i}`"
          :initial="{ opacity: 0, y: 60, rotate: i === 0 ? -4 : i === 2 ? 4 : 0 }"
          :animate="{ opacity: 1, y: 0, rotate: i === 0 ? -4 : i === 2 ? 4 : 0 }"
          :while-hover="{ y: -8, rotate: 0, scale: 1.02 }"
          :transition="{ duration: 0.8, delay: 0.8 + i * 0.15, ease: [0.2, 0.7, 0.2, 1] }"
        >
          <div class="reel-card__media">
            <img :src="r.src" :alt="r.title" loading="lazy" />
            <div class="reel-card__crop"></div>
          </div>
          <div class="reel-card__meta">
            <span class="mono">{{ r.act }}</span>
            <span class="reel-card__title">{{ r.title }}</span>
          </div>
        </Motion>

        <!-- Decorative scribbles -->
        <svg class="hero__arrow" viewBox="0 0 120 80" aria-hidden="true">
          <path d="M5 20 Q 40 5, 70 30 T 115 60" stroke="#7ED321" stroke-width="2" fill="none" stroke-linecap="round"/>
          <path d="M105 50 L115 60 L100 64" stroke="#7ED321" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>

    <!-- Marquee strip -->
    <Motion
      class="hero__marquee"
      :initial="{ opacity: 0 }"
      :animate="{ opacity: 1 }"
      :transition="{ duration: 1, delay: 1.4 }"
    >
      <div class="marquee">
        <div class="marquee__track">
          <span class="marquee__item">Limpieza de tanques</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Desinfección antiviral</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Desinsectación</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Desratización</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Fumigación profesional</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">MIP — Manejo Integrado de Plagas</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Productos SENASA / ANMAT</span><span class="marquee__sep">✦</span>
          <!-- duplicated for seamless loop -->
          <span class="marquee__item">Limpieza de tanques</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Desinfección antiviral</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Desinsectación</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Desratización</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Fumigación profesional</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">MIP — Manejo Integrado de Plagas</span><span class="marquee__sep">✦</span>
          <span class="marquee__item">Productos SENASA / ANMAT</span><span class="marquee__sep">✦</span>
        </div>
      </div>
    </Motion>

    <div class="hazard-tape"></div>
  </section>
</template>

<style scoped>
.hero {
  position: relative;
  padding-top: 7rem;
  overflow: hidden;
  background: var(--eco-ink);
  isolation: isolate;
}

.hero__grid {
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(126, 211, 33, 0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(126, 211, 33, 0.05) 1px, transparent 1px);
  background-size: 48px 48px;
  mask-image: radial-gradient(ellipse at 30% 30%, #000 30%, transparent 75%);
  z-index: -1;
}
.hero__glow {
  position: absolute;
  width: 720px;
  height: 720px;
  top: -200px;
  right: -180px;
  background: radial-gradient(circle, rgba(126, 211, 33, 0.18), transparent 60%);
  filter: blur(40px);
  z-index: -1;
  pointer-events: none;
}

.hero__strip {
  border-top: 1px solid rgba(244, 241, 232, 0.06);
  border-bottom: 1px solid rgba(244, 241, 232, 0.06);
  padding: 0.5rem 0;
  margin-bottom: 4rem;
}
.hero__strip-inner {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  font-family: var(--font-mono);
  font-size: 0.6875rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.55);
  flex-wrap: wrap;
}
.hero__strip-inner .mono.dot { color: var(--eco-lime); }
.mono { font-family: var(--font-mono); }

.hero__main {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: 4rem;
  align-items: start;
  padding-bottom: 5rem;
}

.hero__title {
  font-size: clamp(3rem, 9.5vw, 9rem);
  margin: 1.25rem 0 1.75rem;
  color: var(--eco-bone);
  display: flex;
  flex-direction: column;
}
.line-mask {
  display: block;
  overflow: hidden;
  padding-bottom: 0.04em;
  line-height: 0.95;
}
.line-mask--small { margin-top: 0.5em; }
.hero__title .line {
  display: inline-block;
  will-change: transform;
}
.hero__title .line--accent {
  color: var(--eco-lime);
  font-style: italic;
  font-weight: 800;
}
.hero__title .line--small {
  font-size: 0.45em;
  font-weight: 700;
  letter-spacing: -0.01em;
  text-transform: none;
  color: var(--eco-cream);
}

.hero__lede {
  max-width: 36ch;
  margin-bottom: 2rem;
}

.hero__ctas {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  margin-bottom: 3rem;
}
.btn {
  display: inline-flex;
  align-items: center;
  gap: 0.625rem;
  padding: 0.95rem 1.4rem;
  font-family: var(--font-mono);
  font-size: 0.8125rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  border: 1px solid;
  transition: all 0.25s;
  cursor: pointer;
}
.btn--primary {
  background: var(--eco-lime);
  color: var(--eco-ink);
  border-color: var(--eco-lime);
}
.btn--primary:hover {
  background: var(--eco-lime-glow);
  border-color: var(--eco-lime-glow);
  box-shadow: 0 0 32px rgba(126, 211, 33, 0.45);
}
.btn--ghost {
  background: transparent;
  color: var(--eco-bone);
  border-color: rgba(244, 241, 232, 0.25);
}
.btn--ghost:hover {
  border-color: var(--eco-lime);
  color: var(--eco-lime);
}

.hero__stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
  border-top: 1px solid rgba(244, 241, 232, 0.1);
  padding-top: 1.75rem;
  max-width: 460px;
}
.stat__v {
  font-size: clamp(1.75rem, 3.2vw, 2.4rem);
  color: var(--eco-bone);
  letter-spacing: -0.02em;
}
.stat__l {
  font-size: 0.625rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.55);
  margin-top: 0.35rem;
  line-height: 1.4;
}

/* Reel */
.hero__reel {
  position: relative;
  height: 100%;
  min-height: 480px;
}
.reel-card {
  position: absolute;
  width: 260px;
  background: var(--eco-deep);
  border: 1px solid rgba(244, 241, 232, 0.1);
  padding: 0.625rem 0.625rem 0.875rem;
  box-shadow: 0 24px 60px rgba(0, 0, 0, 0.55);
  cursor: pointer;
}
.reel-card--0 {
  top: 0;
  left: 0;
  z-index: 1;
}
.reel-card--1 {
  top: 110px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 3;
  width: 280px;
}
.reel-card--2 {
  top: 60px;
  right: 0;
  z-index: 2;
}
.reel-card__media {
  position: relative;
  aspect-ratio: 4/3;
  overflow: hidden;
  background: #000;
}
.reel-card__media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: contrast(1.05) saturate(1.1);
}
.reel-card__crop {
  position: absolute;
  inset: 0;
  border: 1px dashed rgba(126, 211, 33, 0.4);
  pointer-events: none;
}
.reel-card__crop::before,
.reel-card__crop::after {
  content: '';
  position: absolute;
  width: 14px;
  height: 14px;
  border: 2px solid var(--eco-lime);
}
.reel-card__crop::before { top: -1px; left: -1px; border-right: none; border-bottom: none; }
.reel-card__crop::after { bottom: -1px; right: -1px; border-left: none; border-top: none; }

.reel-card__meta {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding-top: 0.625rem;
  font-size: 0.6875rem;
  color: rgba(244, 241, 232, 0.7);
}
.reel-card__meta .mono {
  font-size: 0.625rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--eco-lime);
  background: rgba(126, 211, 33, 0.1);
  padding: 0.2rem 0.4rem;
}
.reel-card__title { font-weight: 500; }

.hero__arrow {
  position: absolute;
  bottom: -20px;
  right: 20px;
  width: 120px;
  height: 80px;
  opacity: 0.55;
}

/* Marquee */
.hero__marquee {
  border-top: 1px solid rgba(244, 241, 232, 0.08);
  padding: 1.25rem 0;
  background: rgba(126, 211, 33, 0.05);
}
.marquee {
  overflow: hidden;
  width: 100%;
}
.marquee__track {
  display: inline-flex;
  gap: 2rem;
  white-space: nowrap;
  animation: scroll 40s linear infinite;
  font-family: var(--font-display);
  font-weight: 800;
  font-size: clamp(1.5rem, 3vw, 2.4rem);
  text-transform: uppercase;
  letter-spacing: 0.01em;
  color: var(--eco-bone);
}
.marquee__item { padding: 0 1rem; }
.marquee__sep { color: var(--eco-lime); }
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

@media (max-width: 980px) {
  .hero__main { grid-template-columns: 1fr; gap: 4rem; }
  .hero__reel { min-height: 420px; }
}
@media (max-width: 560px) {
  .hero { padding-top: 5.5rem; }
  .hero__strip { margin-bottom: 2.5rem; }
  .hero__reel { min-height: 380px; }
  .reel-card { width: 200px; }
  .reel-card--1 { width: 220px; top: 130px; }
  .hero__stats { grid-template-columns: repeat(3, 1fr); gap: 0.5rem; }
}
</style>
