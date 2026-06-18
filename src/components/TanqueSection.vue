<script setup>
import { Motion } from 'motion-v'

const benefits = [
  {
    icon: 'health_and_safety',
    title: 'Salud antes que nada',
    body: 'Eliminamos focos de infecciones, gérmenes patógenos, virus y bacterias responsables de disentería y gastroenteritis.',
  },
  {
    icon: 'clean_hands',
    title: 'Agua de verdad limpia',
    body: 'Removemos depósitos de mugre, manchas de óxido, incrustaciones y materia orgánica acumulada en el fondo del tanque.',
  },
  {
    icon: 'shower',
    title: 'Cuidamos tu piel',
    body: 'Tu piel absorbe lo que el agua trae. Un tanque sucio significa químicos y minerales entrando en tu cuerpo cada ducha.',
  },
  {
    icon: 'pest_control',
    title: 'Sin larvas, sin algas',
    body: 'Controlamos microorganismos como algas, bacterias y larvas de mosquitos que buscan refugio dentro del tanque.',
  },
]

const compareRows = [
  { label: 'Costo', tank: '1×', filter: '5×', tankNote: 'limpieza completa', filterNote: 'mantenimiento + filtros' },
  { label: 'Frecuencia', tank: '6 meses', filter: '1–3 meses', tankNote: 'desinfecta toda la red', filterNote: 'solo en la canilla' },
  { label: 'Cobertura', tank: 'Cocina, baño, lavadero', filter: 'Un punto de uso', tankNote: 'todo el hogar', filterNote: 'limitado' },
]
</script>

<template>
  <section id="tanques" class="tanques">
    <!-- Section header -->
    <div class="container tanques__head">
      <Motion
        as="div"
        class="act-mark"
        :initial="{ opacity: 0, x: -40 }"
        :while-in-view="{ opacity: 1, x: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.7 }"
      >
        <span class="act-mark__num display">01</span>
        <span class="act-mark__label mono">ACTO PRIMERO</span>
      </Motion>

      <div class="tanques__heading">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ opacity: 0 }"
          :while-in-view="{ opacity: 1 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6, delay: 0.1 }"
        >Limpieza de Tanques de Agua Potable</Motion>

        <Motion
          as="h2"
          class="tanques__title display"
          :initial="{ opacity: 0, y: 30 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.15 }"
        >
          Si el agua se queda<br/>
          quieta, <em>algo crece</em>.
        </Motion>

        <Motion
          as="p"
          class="body-lg tanques__lede"
          :initial="{ opacity: 0, y: 20 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.3 }"
        >
          El agua que toma tu familia se acumula primero en el tanque y luego se ramifica
          por la cocina, el baño y el lavadero. Limpiar y desinfectar dos veces al año
          garantiza agua segura en cada punto de uso.
        </Motion>
      </div>
    </div>

    <!-- Diagram + benefits grid -->
    <div class="container tanques__body">
      <Motion
        class="diagram"
        :initial="{ opacity: 0, scale: 0.94 }"
        :while-in-view="{ opacity: 1, scale: 1 }"
        :in-view-options="{ once: true, margin: '0px 0px -150px 0px' }"
        :transition="{ duration: 0.9, ease: [0.16, 1, 0.3, 1] }"
      >
        <svg viewBox="0 0 320 460" class="diagram__svg" aria-hidden="true">
          <!-- Sky gradient -->
          <defs>
            <linearGradient id="water-grad" x1="0" x2="0" y1="0" y2="1">
              <stop offset="0%" stop-color="#7ED321" stop-opacity="0.35"/>
              <stop offset="100%" stop-color="#7ED321" stop-opacity="0.05"/>
            </linearGradient>
            <linearGradient id="tank-grad" x1="0" x2="0" y1="0" y2="1">
              <stop offset="0%" stop-color="#1a2f1d"/>
              <stop offset="100%" stop-color="#0b1610"/>
            </linearGradient>
          </defs>

          <!-- Tank cap -->
          <rect x="100" y="60" width="120" height="20" rx="2" fill="#222" stroke="#7ED321" stroke-width="1.5"/>
          <line x1="120" y1="60" x2="120" y2="80" stroke="#7ED321" stroke-width="1" stroke-dasharray="2 2"/>
          <line x1="200" y1="60" x2="200" y2="80" stroke="#7ED321" stroke-width="1" stroke-dasharray="2 2"/>

          <!-- Tank body -->
          <rect x="60" y="80" width="200" height="280" rx="4" fill="url(#tank-grad)" stroke="#7ED321" stroke-width="2"/>

          <!-- Clean water inside -->
          <rect x="64" y="120" width="192" height="236" fill="url(#water-grad)">
            <animate attributeName="opacity" values="0.7;1;0.7" dur="4s" repeatCount="indefinite"/>
          </rect>

          <!-- Water surface line -->
          <line x1="64" y1="125" x2="256" y2="125" stroke="#7ED321" stroke-width="1.5" stroke-dasharray="6 4">
            <animate attributeName="stroke-dashoffset" values="0;-20" dur="3s" repeatCount="indefinite"/>
          </line>

          <!-- Ripples -->
          <ellipse cx="160" cy="160" rx="60" ry="3" fill="none" stroke="#7ED321" stroke-width="1" opacity="0.4"/>
          <ellipse cx="160" cy="200" rx="40" ry="2" fill="none" stroke="#7ED321" stroke-width="1" opacity="0.3"/>

          <!-- Output pipe -->
          <rect x="55" y="320" width="10" height="20" fill="#222" stroke="#7ED321" stroke-width="1.5"/>
          <rect x="20" y="328" width="40" height="6" fill="#7ED321" opacity="0.4"/>

          <!-- Water drops -->
          <g class="drops">
            <circle cx="20" cy="345" r="3" fill="#7ED321">
              <animate attributeName="cy" values="345;380;345" dur="2s" repeatCount="indefinite"/>
              <animate attributeName="opacity" values="1;0;1" dur="2s" repeatCount="indefinite"/>
            </circle>
            <circle cx="35" cy="350" r="2.5" fill="#7ED321">
              <animate attributeName="cy" values="350;385;350" dur="2.3s" repeatCount="indefinite" begin="0.4s"/>
              <animate attributeName="opacity" values="1;0;1" dur="2.3s" repeatCount="indefinite" begin="0.4s"/>
            </circle>
          </g>

          <!-- Tank legs -->
          <rect x="70" y="360" width="6" height="50" fill="#222" stroke="#7ED321" stroke-width="1"/>
          <rect x="244" y="360" width="6" height="50" fill="#222" stroke="#7ED321" stroke-width="1"/>
          <rect x="50" y="410" width="220" height="6" fill="#7ED321" opacity="0.6"/>

          <!-- Labels -->
          <g font-family="JetBrains Mono" font-size="9" fill="#7ED321" letter-spacing="1.5">
            <text x="225" y="50">TAPA SELLADA</text>
            <line x1="225" y1="55" x2="220" y2="70" stroke="#7ED321" stroke-width="0.8"/>

            <text x="270" y="135" text-anchor="start">H₂O LIMPIA</text>
            <line x1="265" y1="132" x2="258" y2="130" stroke="#7ED321" stroke-width="0.8"/>

            <text x="270" y="250" text-anchor="start">DESINFECCIÓN</text>
            <text x="270" y="262" text-anchor="start">100%</text>
            <line x1="265" y1="245" x2="258" y2="240" stroke="#7ED321" stroke-width="0.8"/>

            <text x="-2" y="378" text-anchor="start" fill="#E8E2CF">→ A LA CASA</text>
          </g>

          <!-- Top badge -->
          <g transform="translate(160, 30)">
            <circle r="14" fill="#7ED321"/>
            <text font-family="Big Shoulders Display" font-size="14" font-weight="900" fill="#050805" text-anchor="middle" y="5">✓</text>
          </g>
        </svg>

        <div class="diagram__caption mono">
          FIG. 01 — Estado óptimo post-servicio
        </div>
      </Motion>

      <div class="benefits">
        <Motion
          v-for="(b, i) in benefits"
          :key="b.title"
          class="benefit"
          :initial="{ opacity: 0, y: 30 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
          :transition="{ duration: 0.6, delay: i * 0.1 }"
        >
          <div class="benefit__icon">
            <span class="mi mi-out">{{ b.icon }}</span>
          </div>
          <div class="benefit__copy">
            <h3 class="benefit__title">{{ b.title }}</h3>
            <p class="benefit__body">{{ b.body }}</p>
          </div>
        </Motion>
      </div>
    </div>

    <!-- Comparison card -->
    <div class="container">
      <Motion
        class="compare"
        :initial="{ opacity: 0, y: 40 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="compare__head">
          <div class="compare__intro">
            <span class="eyebrow">¿Tanque o purificador?</span>
            <h3 class="compare__title display">
              La cuenta es simple:<br/>
              <em>limpiar sale 5× menos</em>.
            </h3>
            <p>
              Un purificador filtra el último metro antes de la canilla. Limpiar el tanque
              desinfecta todo el sistema —cocina, baño, lavadero— al mismo tiempo. Con un
              servicio se podrían hacer 3 o 4 limpiezas al año.
            </p>
          </div>
        </div>

        <div class="compare__table">
          <div class="compare__header">
            <span></span>
            <span class="compare__col compare__col--us mono">Limpieza de tanque</span>
            <span class="compare__col compare__col--them mono">Solo purificador</span>
          </div>
          <div v-for="row in compareRows" :key="row.label" class="compare__row">
            <span class="compare__label mono">{{ row.label }}</span>
            <span class="compare__cell compare__cell--us">
              <span class="display compare__value">{{ row.tank }}</span>
              <span class="compare__note">{{ row.tankNote }}</span>
            </span>
            <span class="compare__cell compare__cell--them">
              <span class="display compare__value">{{ row.filter }}</span>
              <span class="compare__note">{{ row.filterNote }}</span>
            </span>
          </div>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.tanques {
  padding: 7rem 0 6rem;
  background: var(--eco-ink);
  position: relative;
}
.tanques::before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 80%;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(126, 211, 33, 0.4), transparent);
}

.tanques__head {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 3rem;
  align-items: start;
  margin-bottom: 5rem;
}

.act-mark {
  border-left: 2px solid var(--eco-lime);
  padding-left: 1.25rem;
  display: flex;
  flex-direction: column;
}
.act-mark__num {
  font-size: clamp(4rem, 8vw, 7rem);
  color: var(--eco-lime);
  line-height: 0.8;
}
.act-mark__label {
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.55);
  margin-top: 0.4rem;
}

.tanques__heading { padding-top: 0.75rem; }
.tanques__title {
  font-size: clamp(2.25rem, 5.5vw, 4.75rem);
  margin: 1rem 0 1.5rem;
  color: var(--eco-bone);
}
.tanques__title em {
  font-style: italic;
  color: var(--eco-lime);
  font-weight: 800;
}
.tanques__lede {
  max-width: 56ch;
}

.tanques__body {
  display: grid;
  grid-template-columns: 1fr 1.4fr;
  gap: 5rem;
  align-items: start;
  margin-bottom: 5rem;
}

.diagram {
  position: relative;
}
.diagram__svg {
  width: 100%;
  max-width: 360px;
  height: auto;
}
.diagram__caption {
  font-size: 0.6875rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.55);
  margin-top: 1rem;
  border-top: 1px solid rgba(126, 211, 33, 0.2);
  padding-top: 0.75rem;
}

.benefits {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.25rem;
}
.benefit {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 1rem;
  padding: 1.5rem;
  background: var(--eco-deep);
  border: 1px solid rgba(244, 241, 232, 0.08);
  transition: border-color 0.3s, transform 0.3s;
  position: relative;
}
.benefit::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 24px;
  height: 24px;
  border-top: 2px solid var(--eco-lime);
  border-left: 2px solid var(--eco-lime);
}
.benefit:hover {
  border-color: rgba(126, 211, 33, 0.4);
  transform: translateY(-3px);
}
.benefit__icon {
  width: 44px;
  height: 44px;
  display: grid;
  place-items: center;
  background: rgba(126, 211, 33, 0.1);
  color: var(--eco-lime);
}
.benefit__icon .mi { font-size: 1.5rem; }
.benefit__title {
  font-family: var(--font-display);
  font-weight: 800;
  text-transform: uppercase;
  font-size: 1.05rem;
  letter-spacing: 0.01em;
  color: var(--eco-bone);
  margin-bottom: 0.4rem;
}
.benefit__body {
  font-size: 0.9375rem;
  color: var(--eco-cream);
  line-height: 1.5;
}

/* Compare */
.compare {
  background: linear-gradient(135deg, var(--eco-deep), #0a1410);
  border: 1px solid rgba(126, 211, 33, 0.18);
  padding: clamp(2rem, 4vw, 3rem);
  position: relative;
  overflow: hidden;
}
.compare::after {
  content: '';
  position: absolute;
  top: -50%;
  right: -10%;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(126, 211, 33, 0.12), transparent 60%);
  pointer-events: none;
}
.compare__head { margin-bottom: 2.5rem; max-width: 720px; position: relative; }
.compare__title {
  font-size: clamp(1.75rem, 3.6vw, 2.75rem);
  margin: 0.75rem 0 1rem;
  color: var(--eco-bone);
}
.compare__title em {
  font-style: italic;
  color: var(--eco-lime);
}
.compare__intro p {
  color: var(--eco-cream);
  font-size: 1.0625rem;
  max-width: 60ch;
}

.compare__table {
  display: flex;
  flex-direction: column;
  gap: 0;
  position: relative;
}
.compare__header,
.compare__row {
  display: grid;
  grid-template-columns: 140px 1fr 1fr;
  gap: 1rem;
  padding: 1rem 0;
  align-items: center;
}
.compare__header {
  border-bottom: 1px solid rgba(126, 211, 33, 0.3);
}
.compare__row {
  border-bottom: 1px dashed rgba(244, 241, 232, 0.1);
}
.compare__row:last-child { border-bottom: none; }
.compare__col,
.compare__label {
  font-size: 0.6875rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.55);
}
.compare__col--us { color: var(--eco-lime); }
.compare__cell {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}
.compare__value {
  font-size: clamp(1.5rem, 3vw, 2rem);
  line-height: 1;
}
.compare__cell--us .compare__value { color: var(--eco-lime); }
.compare__cell--them .compare__value { color: rgba(244, 241, 232, 0.5); }
.compare__note {
  font-size: 0.8125rem;
  color: var(--eco-cream);
}
.compare__cell--them .compare__note { color: rgba(244, 241, 232, 0.4); }

@media (max-width: 880px) {
  .tanques__head { grid-template-columns: 1fr; gap: 1.5rem; }
  .tanques__body { grid-template-columns: 1fr; gap: 3rem; }
  .benefits { grid-template-columns: 1fr; }
  .compare__header, .compare__row { grid-template-columns: 90px 1fr 1fr; gap: 0.5rem; }
}
</style>
