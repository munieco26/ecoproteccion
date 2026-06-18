<script setup>
import { Motion } from 'motion-v'

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
  { k: 'Cultural', d: 'Hábitos, limpieza, manejo de residuos.' },
  { k: 'Biológica', d: 'Enemigos naturales y barreras vivas.' },
  { k: 'Estructural', d: 'Aislamiento, sellado y mejoras edilicias.' },
]
</script>

<template>
  <section id="mip" class="mip">
    <div class="container mip__head">
      <Motion
        as="div"
        class="act-mark"
        :initial="{ opacity: 0, x: -40 }"
        :while-in-view="{ opacity: 1, x: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.7 }"
      >
        <span class="act-mark__num display">03</span>
        <span class="act-mark__label mono">ACTO TERCERO</span>
      </Motion>

      <div class="mip__heading">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ opacity: 0 }"
          :while-in-view="{ opacity: 1 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6, delay: 0.1 }"
        >MIP — Manejo Integrado de Plagas</Motion>

        <Motion
          as="h2"
          class="mip__title display"
          :initial="{ opacity: 0, y: 30 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.15 }"
        >
          Menos veneno.<br/>
          <em>Más estrategia.</em>
        </Motion>

        <Motion
          as="p"
          class="body-lg mip__lede"
          :initial="{ opacity: 0, y: 20 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.3 }"
        >
          Un método que combina prácticas culturales, biológicas y estructurales para
          controlar cualquier infestación. Usamos información actualizada sobre los
          ciclos de vida de las plagas y su interacción con el ambiente para reducir
          drásticamente el uso de pesticidas.
        </Motion>
      </div>
    </div>

    <!-- Strategy chips -->
    <div class="container">
      <Motion
        class="strategies"
        :initial="{ opacity: 0, y: 30 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.7 }"
      >
        <div class="strategies__label mono">PILARES →</div>
        <div
          v-for="s in strategies"
          :key="s.k"
          class="strategy"
        >
          <span class="strategy__k display">{{ s.k }}</span>
          <span class="strategy__d">{{ s.d }}</span>
        </div>
      </Motion>
    </div>

    <!-- Process flow -->
    <div class="container mip__flow">
      <svg class="flow-line" viewBox="0 0 1200 4" preserveAspectRatio="none" aria-hidden="true">
        <line x1="0" y1="2" x2="1200" y2="2" stroke="#7ED321" stroke-width="1" stroke-dasharray="6 6"/>
      </svg>

      <Motion
        v-for="(p, i) in phases"
        :key="p.n"
        class="phase"
        :initial="{ opacity: 0, y: 40 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
        :transition="{ duration: 0.7, delay: i * 0.12 }"
      >
        <div class="phase__node">
          <span class="mono phase__n">{{ p.n }}</span>
          <div class="phase__hex">
            <span class="mi mi-out">{{ p.icon }}</span>
          </div>
        </div>
        <h3 class="phase__title display">{{ p.title }}</h3>
        <p class="phase__body">{{ p.body }}</p>
      </Motion>
    </div>

    <!-- Outcome box -->
    <div class="container">
      <Motion
        class="outcome"
        :initial="{ opacity: 0, y: 40 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="outcome__num display">↓</div>
        <div class="outcome__copy">
          <span class="mono outcome__tag">RESULTADO</span>
          <h3 class="outcome__title display">
            Reducción drástica<br/>
            del uso de pesticidas.
          </h3>
          <p>
            Minimizamos la toxicidad y el impacto negativo sobre la salud de las personas
            y el ambiente. La intervención química se vuelve la última instancia, no la
            primera.
          </p>
        </div>
        <div class="outcome__metrics">
          <div class="metric">
            <span class="metric__v display">−85%</span>
            <span class="metric__l mono">químicos vs. método tradicional</span>
          </div>
          <div class="metric">
            <span class="metric__v display">0</span>
            <span class="metric__l mono">intoxicaciones reportadas</span>
          </div>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.mip {
  padding: 7rem 0 6rem;
  background:
    radial-gradient(ellipse 800px 400px at 80% 20%, rgba(126, 211, 33, 0.06), transparent 60%),
    var(--eco-ink);
  position: relative;
}
.mip::before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 80%;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(126, 211, 33, 0.4), transparent);
}

.mip__head {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 3rem;
  align-items: start;
  margin-bottom: 4rem;
}
.act-mark { border-left: 2px solid var(--eco-lime); padding-left: 1.25rem; }
.act-mark__num { font-size: clamp(4rem, 8vw, 7rem); color: var(--eco-lime); line-height: 0.8; display: block; }
.act-mark__label { display: block; font-size: 0.6875rem; letter-spacing: 0.2em; text-transform: uppercase; color: rgba(244, 241, 232, 0.55); margin-top: 0.4rem; }

.mip__heading { padding-top: 0.75rem; }
.mip__title {
  font-size: clamp(2.25rem, 5.5vw, 4.75rem);
  margin: 1rem 0 1.5rem;
  color: var(--eco-bone);
}
.mip__title em { font-style: italic; color: var(--eco-lime); font-weight: 800; }
.mip__lede { max-width: 56ch; }

/* Strategies */
.strategies {
  display: grid;
  grid-template-columns: auto repeat(3, 1fr);
  gap: 1rem;
  align-items: stretch;
  padding: 1.25rem;
  background: var(--eco-deep);
  border: 1px solid rgba(126, 211, 33, 0.18);
  margin-bottom: 5rem;
}
.strategies__label {
  display: flex;
  align-items: center;
  padding-right: 1rem;
  border-right: 1px dashed rgba(244, 241, 232, 0.15);
  font-size: 0.6875rem;
  letter-spacing: 0.16em;
  color: var(--eco-lime);
}
.strategy {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
  padding: 0.5rem 1rem;
  border-right: 1px dashed rgba(244, 241, 232, 0.08);
}
.strategy:last-child { border-right: none; }
.strategy__k {
  font-size: 1.5rem;
  color: var(--eco-bone);
  letter-spacing: -0.01em;
}
.strategy__d {
  font-size: 0.875rem;
  color: var(--eco-cream);
}

/* Flow */
.mip__flow {
  position: relative;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
  padding: 3rem 0 4rem;
  margin-bottom: 4rem;
}
.flow-line {
  position: absolute;
  left: 4%;
  right: 4%;
  top: 76px;
  width: 92%;
  height: 4px;
  z-index: 0;
}

.phase {
  position: relative;
  z-index: 1;
  text-align: left;
}
.phase__node {
  display: inline-flex;
  align-items: center;
  gap: 0.75rem;
  margin-bottom: 1.5rem;
}
.phase__n {
  font-size: 0.875rem;
  color: var(--eco-lime);
  font-weight: 700;
  letter-spacing: 0.04em;
}
.phase__hex {
  width: 72px;
  height: 80px;
  display: grid;
  place-items: center;
  background: var(--eco-deep);
  color: var(--eco-lime);
  border: 1.5px solid var(--eco-lime);
  clip-path: polygon(50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%, 0 25%);
  position: relative;
  transition: all 0.4s;
}
.phase:hover .phase__hex {
  background: var(--eco-lime);
  color: var(--eco-ink);
  transform: scale(1.05);
}
.phase__hex .mi { font-size: 1.875rem; }
.phase__title {
  font-size: 1.5rem;
  color: var(--eco-bone);
  margin-bottom: 0.5rem;
}
.phase__body {
  font-size: 0.9375rem;
  color: var(--eco-cream);
  line-height: 1.55;
  max-width: 28ch;
}

/* Outcome */
.outcome {
  display: grid;
  grid-template-columns: 80px 1.5fr 1fr;
  gap: 2.5rem;
  align-items: center;
  background: linear-gradient(135deg, var(--eco-lime), #9bef3a);
  color: var(--eco-ink);
  padding: clamp(2rem, 4vw, 3rem);
  position: relative;
  overflow: hidden;
}
.outcome::before {
  content: 'MIP / OUT';
  position: absolute;
  top: 50%;
  right: -2rem;
  transform: translateY(-50%) rotate(90deg);
  font-family: var(--font-mono);
  font-size: 9rem;
  font-weight: 700;
  color: rgba(5, 8, 5, 0.07);
  letter-spacing: -0.05em;
  pointer-events: none;
}
.outcome__num {
  font-size: clamp(3rem, 8vw, 6rem);
  color: var(--eco-ink);
  line-height: 0.8;
}
.outcome__tag {
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(5, 8, 5, 0.7);
}
.outcome__title {
  font-size: clamp(1.75rem, 3.4vw, 2.75rem);
  color: var(--eco-ink);
  margin: 0.5rem 0 1rem;
}
.outcome__copy p {
  color: rgba(5, 8, 5, 0.85);
  max-width: 56ch;
  font-size: 1rem;
}
.outcome__metrics {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  position: relative;
  z-index: 1;
}
.metric {
  border-top: 2px solid var(--eco-ink);
  padding-top: 0.6rem;
}
.metric__v {
  font-size: clamp(2rem, 4.5vw, 3.5rem);
  color: var(--eco-ink);
  line-height: 0.9;
}
.metric__l {
  font-size: 0.625rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: rgba(5, 8, 5, 0.7);
  margin-top: 0.3rem;
  display: block;
  max-width: 18ch;
}

@media (max-width: 980px) {
  .mip__head { grid-template-columns: 1fr; gap: 1.5rem; }
  .strategies { grid-template-columns: 1fr; }
  .strategies__label { border-right: none; border-bottom: 1px dashed rgba(244, 241, 232, 0.15); padding: 0 0 0.75rem 0; }
  .strategy { border-right: none; border-bottom: 1px dashed rgba(244, 241, 232, 0.08); }
  .mip__flow { grid-template-columns: 1fr 1fr; }
  .flow-line { display: none; }
  .outcome { grid-template-columns: 1fr; gap: 1.5rem; }
}
@media (max-width: 560px) {
  .mip__flow { grid-template-columns: 1fr; }
}
</style>
