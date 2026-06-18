<script setup>
import { Motion } from 'motion-v'
import HexMotif from './HexMotif.vue'

const stats = [
  { v: '15+',  l: 'años protegiendo el AMBA' },
  { v: '730 / 988', l: 'registros SENASA · ANMAT' },
  { v: '24 h', l: 'respuesta promedio' },
]

const tags = [
  'Limpieza de tanques',
  'Desinfección antiviral',
  'Desinsectación',
  'Desratización',
  'MIP',
]
</script>

<template>
  <section id="top" class="hero">
    <!-- Background hexagonal motifs -->
    <HexMotif position="tl" variant="solid" :size="320" />
    <HexMotif position="tr" variant="solid" :size="280" />

    <!-- Subtle outline hexagons for texture -->
    <svg class="hero__field" viewBox="0 0 1440 800" preserveAspectRatio="none" aria-hidden="true">
      <g stroke="#0B1410" stroke-opacity="0.06" fill="none" stroke-width="1.2">
        <path d="M120 110 L156 110 Q168 110 174 120 L186 142 Q192 152 186 162 L174 184 Q168 194 156 194 L120 194 Q108 194 102 184 L90 162 Q84 152 90 142 L102 120 Q108 110 120 110 Z"/>
        <path d="M1240 540 L1280 540 Q1294 540 1300 552 L1312 576 Q1318 588 1312 600 L1298 626 Q1292 638 1278 638 L1242 638 Q1228 638 1222 626 L1210 600 Q1204 588 1210 576 L1224 552 Q1230 540 1240 540 Z"/>
      </g>
    </svg>

    <div class="hero__main container">
      <div class="hero__chevron">
        <span class="mi">expand_more</span>
      </div>

      <div class="hero__copy">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ x: -12 }"
          :animate="{ x: 0 }"
          :transition="{ duration: 0.6, delay: 0.3 }"
        >
          Ecoprotección · Buenos Aires
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
              class="line"
              :initial="{ y: '105%' }"
              :animate="{ y: 0 }"
              :transition="{ duration: 0.9, delay: 0.55, ease: [0.16, 1, 0.3, 1] }"
            >ambiental, <em>de raíz.</em></Motion>
          </span>
        </h1>

        <Motion
          as="p"
          class="hero__lede body-lg"
          :initial="{ y: 16 }"
          :animate="{ y: 0 }"
          :transition="{ duration: 0.7, delay: 0.85 }"
        >
          Control de plagas, desinfección y limpieza de tanques de agua potable
          con productos aprobados por SENASA y ANMAT, de baja toxicidad.
          Acompañamos a hogares, consorcios, hoteles, hospitales,
          countries y oficinas en todo el AMBA.
        </Motion>

        <Motion
          class="hero__ctas"
          :initial="{ y: 16 }"
          :animate="{ y: 0 }"
          :transition="{ duration: 0.7, delay: 1 }"
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
          class="hero__tags"
          :initial="{ y: 10 }"
          :animate="{ y: 0 }"
          :transition="{ duration: 0.8, delay: 1.15 }"
        >
          <span v-for="t in tags" :key="t" class="hero-tag">{{ t }}</span>
        </Motion>
      </div>

      <Motion
        class="hero__card"
        :initial="{ y: 30 }"
        :animate="{ y: 0 }"
        :transition="{ duration: 0.9, delay: 0.7, ease: [0.16, 1, 0.3, 1] }"
      >
        <div class="hero__card-photo">
          <img src="/assets/photos/fumigacion-jardin.png" alt="Operador de Ecoprotección" />
          <div class="hero__card-badge">
            <span class="mono">REG. 730 · 988</span>
            <span>SENASA · ANMAT</span>
          </div>
        </div>
        <div class="hero__card-body">
          <div v-for="s in stats" :key="s.v" class="hero__stat">
            <span class="hero__stat-v display">{{ s.v }}</span>
            <span class="hero__stat-l">{{ s.l }}</span>
          </div>
        </div>
      </Motion>
    </div>

    <!-- Bottom forest band — section transition -->
    <Motion
      class="hero__band eco-band"
      :initial="{ y: 20 }"
      :animate="{ y: 0 }"
      :transition="{ duration: 1, delay: 1.4 }"
    >
      <div class="container hero__band-inner">
        <div class="hero__band-mark">
          <svg viewBox="0 0 40 48" width="32" height="38" aria-hidden="true">
            <circle cx="20" cy="20" r="18" fill="none" stroke="#F7F4EC" stroke-width="1.5"/>
            <path
              d="M20 8 C 16 8, 13 11, 13 15 C 9 15, 7 18, 9 22 C 6 23, 6 27, 9 28 L 31 28 C 34 27, 34 23, 31 22 C 33 18, 31 15, 27 15 C 27 11, 24 8, 20 8 Z"
              fill="#F7F4EC"
            />
            <rect x="19" y="28" width="2" height="6" fill="#F7F4EC"/>
          </svg>
          <span class="mono">Desde 2009 · Buenos Aires · AR</span>
        </div>

        <div class="hero__band-marquee">
          <div class="hero__band-track">
            <span>Salud antes que nada</span>
            <span>·</span>
            <span>Productos de baja toxicidad</span>
            <span>·</span>
            <span>Manejo integrado de plagas</span>
            <span>·</span>
            <span>Limpieza de tanques de agua potable</span>
            <span>·</span>
            <span>Atención personalizada</span>
            <span>·</span>
            <span>Salud antes que nada</span>
            <span>·</span>
            <span>Productos de baja toxicidad</span>
            <span>·</span>
            <span>Manejo integrado de plagas</span>
            <span>·</span>
          </div>
        </div>
      </div>
    </Motion>
  </section>
</template>

<style scoped>
.hero {
  position: relative;
  padding-top: clamp(8rem, 14vh, 11rem);
  background: var(--eco-bone);
  isolation: isolate;
  overflow: hidden;
}
.hero__field {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
  pointer-events: none;
}

.hero__chevron {
  position: absolute;
  top: 92px;
  left: 50%;
  transform: translateX(-50%);
  color: var(--eco-forest);
  opacity: 0.55;
}
.hero__chevron .mi { font-size: 1.75rem; }

.hero__main {
  display: grid;
  grid-template-columns: 1.35fr 1fr;
  gap: clamp(2rem, 5vw, 4.5rem);
  align-items: center;
  padding-bottom: 7rem;
  position: relative;
  z-index: 2;
}

.hero__title {
  font-size: clamp(2.75rem, 8.5vw, 7.5rem);
  margin: 1.25rem 0 1.5rem;
  display: flex;
  flex-direction: column;
  font-weight: 500;
}
.line-mask {
  display: block;
  overflow: hidden;
  padding-bottom: 0.04em;
  line-height: 1.02;
}
.hero__title .line { display: inline-block; will-change: transform; }

.hero__lede { max-width: 46ch; margin-bottom: 2rem; }

.hero__ctas {
  display: flex;
  gap: 0.75rem;
  flex-wrap: wrap;
  margin-bottom: 2.5rem;
}

.hero__tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.4rem;
}
.hero-tag {
  display: inline-flex;
  align-items: center;
  padding: 0.4rem 0.85rem;
  font-size: 0.8125rem;
  color: var(--eco-graphite);
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: 999px;
}

/* Right-hand visual card */
.hero__card {
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-lg);
  overflow: hidden;
  box-shadow: var(--shadow-card);
  position: relative;
}
.hero__card-photo {
  position: relative;
  aspect-ratio: 5/4;
  background: var(--eco-fog);
}
.hero__card-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  filter: saturate(0.95);
}
.hero__card-badge {
  position: absolute;
  bottom: 1rem;
  left: 1rem;
  display: flex;
  flex-direction: column;
  gap: 0.15rem;
  padding: 0.55rem 0.85rem;
  background: var(--eco-ink);
  color: var(--eco-bone);
  border-radius: 12px;
  font-size: 0.75rem;
  line-height: 1.2;
}
.hero__card-badge .mono {
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  color: var(--eco-leaf);
  text-transform: uppercase;
}

.hero__card-body {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  border-top: 1px solid var(--eco-line);
}
.hero__stat {
  padding: 1.1rem 1rem;
  border-right: 1px solid var(--eco-line);
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}
.hero__stat:last-child { border-right: none; }
.hero__stat-v {
  font-size: clamp(1.4rem, 2.2vw, 1.85rem);
  font-weight: 600;
  color: var(--eco-ink);
}
.hero__stat-l {
  font-size: 0.7rem;
  color: var(--eco-muted);
  line-height: 1.35;
}

/* Bottom green band — the curved sweep from the reference */
.hero__band {
  position: relative;
  z-index: 1;
  margin-top: -3.5rem;
}
.hero__band-inner {
  display: flex;
  align-items: center;
  gap: 2rem;
  padding: 1.5rem 0;
  position: relative;
}
.hero__band-mark {
  display: inline-flex;
  align-items: center;
  gap: 0.65rem;
  flex-shrink: 0;
}
.hero__band-mark .mono {
  font-size: 0.6875rem;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: rgba(247, 244, 236, 0.85);
}

.hero__band-marquee {
  flex: 1;
  overflow: hidden;
  mask-image: linear-gradient(90deg, transparent, #000 8%, #000 92%, transparent);
  -webkit-mask-image: linear-gradient(90deg, transparent, #000 8%, #000 92%, transparent);
}
.hero__band-track {
  display: inline-flex;
  gap: 1.5rem;
  white-space: nowrap;
  font-family: var(--font-display);
  font-size: 1.125rem;
  font-style: italic;
  font-weight: 400;
  color: var(--eco-bone);
  animation: hero-band-scroll 38s linear infinite;
}
.hero__band-track span:not(:first-child) { padding-left: 0; }
.hero__band-track span { opacity: 0.92; }
@keyframes hero-band-scroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

@media (max-width: 980px) {
  .hero__main { grid-template-columns: 1fr; gap: 3rem; padding-bottom: 5.5rem; }
  .hero__card { max-width: 520px; }
}
@media (max-width: 640px) {
  .hero { padding-top: 7rem; }
  .hero__card-body { grid-template-columns: 1fr; }
  .hero__stat { border-right: none; border-bottom: 1px solid var(--eco-line); }
  .hero__stat:last-child { border-bottom: none; }
  .hero__band-inner { padding: 1.25rem 0; flex-direction: column; align-items: flex-start; }
}
</style>
