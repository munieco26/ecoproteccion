<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Motion } from 'motion-v'
import HexMotif from './HexMotif.vue'

const reduction = ref(0)
let observer = null
let rafId = null

function animateTo(target, duration = 1600) {
  const start = performance.now()
  const from = reduction.value
  const tick = (now) => {
    const t = Math.min(1, (now - start) / duration)
    const eased = 1 - Math.pow(1 - t, 3)
    reduction.value = Math.round(from + (target - from) * eased)
    if (t < 1) rafId = requestAnimationFrame(tick)
  }
  cancelAnimationFrame(rafId)
  rafId = requestAnimationFrame(tick)
}

onMounted(() => {
  const el = document.querySelector('#mip .outcome')
  if (!el || typeof IntersectionObserver === 'undefined') {
    reduction.value = 85
    return
  }
  observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateTo(85)
        observer.disconnect()
      }
    })
  }, { threshold: 0.35 })
  observer.observe(el)
})

onUnmounted(() => {
  observer?.disconnect()
  cancelAnimationFrame(rafId)
})

const phases = [
  {
    n: '01',
    icon: 'visibility',
    title: 'Diagnóstico',
    body: 'Estudiamos el ciclo de vida de la plaga y su interacción con el medio: cómo entra, dónde se reproduce, qué busca.',
  },
  {
    n: '02',
    icon: 'shield_moon',
    title: 'Prevención',
    body: 'Mejoras ambientales, culturales y de infraestructura para cortar el acceso. Antes de aplicar nada, evitamos.',
  },
  {
    n: '03',
    icon: 'monitoring',
    title: 'Monitoreo',
    body: 'Estaciones de cebado, trampas pegamentosas y registros periódicos para detectar actividad temprano.',
  },
  {
    n: '04',
    icon: 'sanitizer',
    title: 'Control mínimo',
    body: 'Cuando hace falta, intervenimos con productos de baja toxicidad —los menos posibles, en el lugar exacto.',
  },
]

const strategies = [
  { k: 'Cultural',    d: 'Hábitos, limpieza y manejo de residuos.' },
  { k: 'Biológica',   d: 'Enemigos naturales y barreras vivas.' },
  { k: 'Estructural', d: 'Aislamiento, sellado y mejoras edilicias.' },
]
</script>

<template>
  <section id="mip" class="mip">
    <HexMotif position="tl" variant="thin" :size="220" :opacity="0.45" />

    <div class="container">
      <div class="section-head">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ y: 6 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6 }"
        >MIP — Manejo Integrado de Plagas</Motion>

        <Motion
          as="h2"
          class="section-head__title display"
          :initial="{ y: 24 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.1 }"
        >
          Menos veneno.<br/>
          <em>Más estrategia.</em>
        </Motion>

        <Motion
          as="p"
          class="body-lg section-head__lede"
          :initial="{ y: 16 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.2 }"
        >
          Un método que combina prácticas culturales, biológicas y estructurales
          para controlar cualquier infestación. Usamos información actualizada sobre
          los ciclos de vida de las plagas y su interacción con el ambiente para
          reducir drásticamente el uso de pesticidas.
        </Motion>
      </div>
    </div>

    <!-- Strategy chips -->
    <div class="container">
      <Motion
        class="strategies"
        :initial="{ y: 24 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.7 }"
      >
        <div class="strategies__label mono">
          <span class="strategies__dot"></span>Pilares
        </div>
        <div v-for="s in strategies" :key="s.k" class="strategy">
          <span class="strategy__k display">{{ s.k }}</span>
          <span class="strategy__d">{{ s.d }}</span>
        </div>
      </Motion>
    </div>

    <!-- Process flow -->
    <div class="container mip__flow">
      <svg class="flow-line" viewBox="0 0 1200 4" preserveAspectRatio="none" aria-hidden="true">
        <line x1="0" y1="2" x2="1200" y2="2" stroke="#1E7A33" stroke-width="1" stroke-dasharray="6 6" opacity="0.4"/>
      </svg>

      <Motion
        v-for="(p, i) in phases"
        :key="p.n"
        class="phase"
        :class="{ 'phase--monitoring': p.icon === 'monitoring' }"
        :initial="{ y: 30 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
        :transition="{ duration: 0.7, delay: i * 0.1 }"
      >
        <div class="phase__node">
          <div class="phase__hex">
            <svg viewBox="0 0 80 88" width="80" height="88" aria-hidden="true">
              <path
                d="M40 4 L72 22 L72 66 L40 84 L8 66 L8 22 Z"
                fill="#FFFFFF"
                stroke="#1E7A33"
                stroke-width="1.5"
              />
            </svg>
            <span class="mi mi-out phase__hex-icon">{{ p.icon }}</span>
          </div>
          <span class="phase__n mono">{{ p.n }}</span>
        </div>
        <h3 class="phase__title display">{{ p.title }}</h3>
        <p class="phase__body">{{ p.body }}</p>
      </Motion>
    </div>

    <!-- Outcome band — the rounded green floor from the reference -->
    <div class="container">
      <Motion
        class="outcome eco-band eco-band--floor"
        :initial="{ y: 32 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="outcome__copy">
          <span class="eyebrow eyebrow--light">Resultado</span>
          <h3 class="outcome__title display">
            Reducción drástica<br/>del uso de pesticidas.
          </h3>
          <p>
            Minimizamos la toxicidad y el impacto negativo sobre la salud de las
            personas y el ambiente. La intervención química se vuelve la última
            instancia, no la primera.
          </p>
        </div>
        <div class="outcome__metrics">
          <div class="metric">
            <span class="metric__v display">
              <span class="metric__sign">−</span><span>{{ reduction }}</span><span class="metric__unit">%</span>
            </span>
            <span class="metric__l">químicos vs. método tradicional</span>
          </div>
          <div class="metric">
            <span class="metric__v display">0</span>
            <span class="metric__l">intoxicaciones reportadas</span>
          </div>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.mip {
  padding: clamp(5rem, 9vw, 7.5rem) 0 6rem;
  background: var(--eco-bone);
  position: relative;
  overflow: hidden;
}

.eyebrow--light { color: var(--eco-bone); }
.eyebrow--light::before { background: var(--eco-bone); }

/* Strategies */
.strategies {
  display: grid;
  grid-template-columns: auto repeat(3, 1fr);
  gap: 0;
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-md);
  margin-bottom: 4.5rem;
  overflow: hidden;
}
.strategies__label {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1.25rem 1.4rem;
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--eco-forest);
  background: var(--eco-moss);
  border-right: 1px solid var(--eco-line);
}
.strategies__dot {
  width: 7px;
  height: 7px;
  background: var(--eco-forest);
  border-radius: 50%;
}
.strategy {
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
  padding: 1.25rem 1.4rem;
  border-right: 1px solid var(--eco-line);
}
.strategy:last-child { border-right: none; }
.strategy__k {
  font-size: 1.35rem;
  color: var(--eco-ink);
  font-weight: 600;
}
.strategy__d {
  font-size: 0.875rem;
  color: var(--eco-graphite);
  line-height: 1.5;
}

/* Flow */
.mip__flow {
  position: relative;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
  padding: 2rem 0 4rem;
  margin-bottom: 4rem;
}
.flow-line {
  position: absolute;
  left: 6%;
  right: 6%;
  top: 88px;
  width: 88%;
  height: 4px;
  z-index: 0;
}

.phase { position: relative; z-index: 1; text-align: left; }
.phase__node {
  position: relative;
  display: inline-flex;
  align-items: center;
  gap: 0.85rem;
  margin-bottom: 1.5rem;
}
.phase__hex {
  position: relative;
  width: 80px;
  height: 88px;
  display: grid;
  place-items: center;
  transition: transform 0.3s;
}
.phase__hex svg { position: absolute; inset: 0; }
.phase__hex-icon {
  position: relative;
  z-index: 1;
  font-size: 1.875rem;
  color: var(--eco-forest);
  transition: color 0.3s;
}
/* Material Icons "monitoring" sits off-center in its em-box — nudge it inward */
.phase--monitoring .phase__hex-icon {
  transform: translate(4px, 4px);
}
.phase:hover .phase__hex { transform: translateY(-3px); }
.phase__n {
  font-size: 0.8125rem;
  color: var(--eco-muted);
  letter-spacing: 0.06em;
  font-weight: 600;
}
.phase__title {
  font-size: 1.35rem;
  color: var(--eco-ink);
  margin-bottom: 0.4rem;
  font-weight: 600;
}
.phase__body {
  font-size: 0.9375rem;
  color: var(--eco-graphite);
  line-height: 1.6;
  max-width: 30ch;
}

/* Outcome band */
.outcome {
  display: grid;
  grid-template-columns: 1.5fr 1fr;
  gap: 3rem;
  align-items: center;
  padding: clamp(2.25rem, 5vw, 3.5rem);
  border-radius: var(--r-lg);
}
.outcome__title {
  font-size: clamp(1.85rem, 3.6vw, 2.75rem);
  color: var(--eco-bone);
  margin: 0.75rem 0 1rem;
}
.outcome__title em { color: var(--eco-bone); font-style: italic; }
.outcome__copy p {
  color: rgba(247, 244, 236, 0.86);
  max-width: 56ch;
  font-size: 1rem;
}
.outcome__metrics {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
}
.metric {
  border-top: 1px solid rgba(247, 244, 236, 0.35);
  padding-top: 0.75rem;
}
.metric__v {
  font-size: clamp(2.25rem, 5vw, 3.5rem);
  color: var(--eco-bone);
  line-height: 0.95;
  font-weight: 600;
}
.metric__l {
  display: block;
  font-size: 0.75rem;
  letter-spacing: 0.06em;
  color: rgba(247, 244, 236, 0.78);
  margin-top: 0.45rem;
  max-width: 22ch;
}

@media (max-width: 980px) {
  .strategies { grid-template-columns: 1fr; }
  .strategies__label { border-right: none; border-bottom: 1px solid var(--eco-line); }
  .strategy { border-right: none; border-bottom: 1px solid var(--eco-line); }
  .strategy:last-child { border-bottom: none; }
  .mip__flow { grid-template-columns: 1fr 1fr; }
  .flow-line { display: none; }
  .outcome { grid-template-columns: 1fr; gap: 2rem; }
}
@media (max-width: 560px) {
  .mip__flow { grid-template-columns: 1fr; }
}
</style>
