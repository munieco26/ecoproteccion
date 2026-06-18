<script setup>
import { Motion } from 'motion-v'
import HexMotif from './HexMotif.vue'

const benefits = [
  {
    icon: 'health_and_safety',
    title: 'Salud antes que nada',
    body: 'Eliminamos focos de infecciones, gérmenes patógenos, virus y bacterias responsables de disentería y gastroenteritis.',
  },
  {
    icon: 'water_drop',
    title: 'Agua de verdad limpia',
    body: 'Removemos depósitos de mugre, manchas de óxido, incrustaciones y materia orgánica acumulada en el fondo del tanque.',
  },
  {
    icon: 'spa',
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
  { label: 'Costo',      tank: '1×',                       filter: '5×',                tankNote: 'limpieza completa',    filterNote: 'mantenimiento + filtros' },
  { label: 'Frecuencia', tank: '6 meses',                  filter: '1–3 meses',         tankNote: 'desinfecta toda la red', filterNote: 'solo en la canilla' },
  { label: 'Cobertura',  tank: 'Cocina, baño, lavadero',   filter: 'Un punto de uso',   tankNote: 'todo el hogar',         filterNote: 'limitado' },
]
</script>

<template>
  <section id="tanques" class="tanques">
    <HexMotif position="br" variant="thin" :size="220" :opacity="0.5" />

    <div class="container">
      <div class="section-head">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ y: 6 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6 }"
        >Limpieza de tanques de agua potable</Motion>

        <Motion
          as="h2"
          class="section-head__title display"
          :initial="{ y: 24 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.1 }"
        >
          Si el agua se queda quieta,<br/>
          <em>algo crece.</em>
        </Motion>

        <Motion
          as="p"
          class="body-lg section-head__lede"
          :initial="{ y: 16 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.2 }"
        >
          El agua que toma tu familia se acumula primero en el tanque y luego se
          ramifica por la cocina, el baño y el lavadero. Limpiar y desinfectar
          dos veces al año garantiza agua segura en cada punto de uso.
        </Motion>
      </div>
    </div>

    <div class="container tanques__body">
      <Motion
        class="diagram"
        :initial="{ y: 30 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
        :transition="{ duration: 0.9, ease: [0.16, 1, 0.3, 1] }"
      >
        <svg viewBox="0 0 320 460" class="diagram__svg" aria-hidden="true">
          <defs>
            <linearGradient id="water-fill" x1="0" x2="0" y1="0" y2="1">
              <stop offset="0%"  stop-color="#1E7A33" stop-opacity="0.18"/>
              <stop offset="100%" stop-color="#1E7A33" stop-opacity="0.02"/>
            </linearGradient>
          </defs>

          <!-- Tank cap -->
          <rect x="100" y="60" width="120" height="18" rx="3" fill="#FFFFFF" stroke="#0B1410" stroke-width="1.6"/>
          <line x1="120" y1="60" x2="120" y2="78" stroke="#1E7A33" stroke-width="1" stroke-dasharray="2 2"/>
          <line x1="200" y1="60" x2="200" y2="78" stroke="#1E7A33" stroke-width="1" stroke-dasharray="2 2"/>

          <!-- Tank body -->
          <rect x="60" y="78" width="200" height="280" rx="6" fill="#FFFFFF" stroke="#0B1410" stroke-width="1.6"/>

          <!-- Water -->
          <rect x="64" y="120" width="192" height="234" rx="3" fill="url(#water-fill)">
            <animate attributeName="opacity" values="0.75;1;0.75" dur="4s" repeatCount="indefinite"/>
          </rect>
          <line x1="64" y1="125" x2="256" y2="125" stroke="#1E7A33" stroke-width="1.5" stroke-dasharray="6 4">
            <animate attributeName="stroke-dashoffset" values="0;-20" dur="3.5s" repeatCount="indefinite"/>
          </line>

          <ellipse cx="160" cy="160" rx="60" ry="3" fill="none" stroke="#1E7A33" stroke-width="1" opacity="0.45"/>
          <ellipse cx="160" cy="200" rx="40" ry="2" fill="none" stroke="#1E7A33" stroke-width="1" opacity="0.35"/>

          <!-- Output pipe -->
          <rect x="55" y="318" width="10" height="20" fill="#FFFFFF" stroke="#0B1410" stroke-width="1.4"/>
          <rect x="20" y="326" width="40" height="6" fill="#1E7A33" opacity="0.6"/>

          <!-- Drops -->
          <g>
            <circle cx="20" cy="345" r="3" fill="#1E7A33">
              <animate attributeName="cy" values="345;380;345" dur="2s" repeatCount="indefinite"/>
              <animate attributeName="opacity" values="1;0;1" dur="2s" repeatCount="indefinite"/>
            </circle>
            <circle cx="35" cy="350" r="2.5" fill="#1E7A33">
              <animate attributeName="cy" values="350;385;350" dur="2.3s" repeatCount="indefinite" begin="0.4s"/>
              <animate attributeName="opacity" values="1;0;1" dur="2.3s" repeatCount="indefinite" begin="0.4s"/>
            </circle>
          </g>

          <!-- Legs -->
          <rect x="70" y="358" width="6" height="50" fill="#0B1410"/>
          <rect x="244" y="358" width="6" height="50" fill="#0B1410"/>
          <rect x="50" y="408" width="220" height="5" fill="#0B1410" opacity="0.5"/>

          <!-- Labels -->
          <g font-family="IBM Plex Mono" font-size="9" fill="#1E7A33" letter-spacing="1.5">
            <text x="225" y="50">TAPA SELLADA</text>
            <line x1="225" y1="55" x2="220" y2="70" stroke="#1E7A33" stroke-width="0.8"/>

            <text x="270" y="135" text-anchor="start">H₂O LIMPIA</text>
            <line x1="265" y1="132" x2="258" y2="130" stroke="#1E7A33" stroke-width="0.8"/>

            <text x="270" y="250" text-anchor="start">DESINFECCIÓN</text>
            <text x="270" y="262" text-anchor="start">100%</text>
            <line x1="265" y1="245" x2="258" y2="240" stroke="#1E7A33" stroke-width="0.8"/>

            <text x="-2" y="378" text-anchor="start" fill="#5E6660">→ A LA CASA</text>
          </g>

          <!-- Top check -->
          <g transform="translate(160, 30)">
            <circle r="14" fill="#1E7A33"/>
            <path d="M-5 0 L-1 4 L6 -4" fill="none" stroke="#F7F4EC" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
          </g>
        </svg>

        <div class="diagram__caption mono">
          Fig. 01 · Estado óptimo post-servicio
        </div>
      </Motion>

      <div class="benefits">
        <Motion
          v-for="(b, i) in benefits"
          :key="b.title"
          class="benefit"
          :initial="{ y: 22 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
          :transition="{ duration: 0.6, delay: i * 0.08 }"
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
        :initial="{ y: 30 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="compare__head">
          <span class="eyebrow">¿Tanque o purificador?</span>
          <h3 class="compare__title display">
            La cuenta es simple:<br/>
            <em>limpiar sale 5 veces menos.</em>
          </h3>
          <p>
            Un purificador filtra el último metro antes de la canilla. Limpiar el
            tanque desinfecta todo el sistema —cocina, baño, lavadero— al mismo
            tiempo. Con un servicio se podrían hacer 3 o 4 limpiezas al año.
          </p>
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
  padding: clamp(5rem, 9vw, 7.5rem) 0 7rem;
  background: var(--eco-bone);
  position: relative;
  overflow: hidden;
}

.tanques__body {
  display: grid;
  grid-template-columns: minmax(0, 360px) minmax(0, 1fr);
  gap: clamp(2rem, 5vw, 5rem);
  align-items: start;
  margin-bottom: 5rem;
}

.diagram {
  position: relative;
  padding: 1.5rem;
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-md);
  box-shadow: var(--shadow-soft);
}
.diagram__svg { width: 100%; max-width: 360px; height: auto; display: block; margin: 0 auto; }
.diagram__caption {
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--eco-muted);
  margin-top: 1rem;
  padding-top: 0.75rem;
  border-top: 1px dashed var(--eco-line);
  text-align: center;
}

.benefits {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
}
.benefit {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 1rem;
  padding: 1.5rem;
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-md);
  transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s;
}
.benefit:hover {
  transform: translateY(-3px);
  border-color: rgba(30, 122, 51, 0.4);
  box-shadow: var(--shadow-soft);
}
.benefit__icon {
  width: 46px;
  height: 46px;
  display: grid;
  place-items: center;
  background: var(--eco-moss);
  color: var(--eco-forest);
  border-radius: 14px;
}
.benefit__icon .mi { font-size: 1.5rem; }
.benefit__title {
  font-family: var(--font-display);
  font-weight: 600;
  font-size: 1.15rem;
  color: var(--eco-ink);
  margin-bottom: 0.35rem;
  letter-spacing: -0.01em;
}
.benefit__body {
  font-size: 0.9375rem;
  color: var(--eco-graphite);
  line-height: 1.55;
}

/* Compare */
.compare {
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-lg);
  padding: clamp(2rem, 4vw, 3.25rem);
  box-shadow: var(--shadow-card);
  position: relative;
  overflow: hidden;
}
.compare::before {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 6px;
  height: 100%;
  background: var(--eco-forest);
  border-radius: var(--r-lg) 0 0 var(--r-lg);
}
.compare__head { margin-bottom: 2.25rem; max-width: 720px; }
.compare__title {
  font-size: clamp(1.65rem, 3.4vw, 2.5rem);
  margin: 0.75rem 0 1rem;
}
.compare__head p {
  color: var(--eco-graphite);
  font-size: 1rem;
  max-width: 60ch;
}

.compare__table { display: flex; flex-direction: column; }
.compare__header,
.compare__row {
  display: grid;
  grid-template-columns: 150px 1fr 1fr;
  gap: 1rem;
  padding: 1.1rem 0;
  align-items: center;
}
.compare__header { border-bottom: 1px solid var(--eco-ink); }
.compare__row {
  border-bottom: 1px dashed var(--eco-line);
}
.compare__row:last-child { border-bottom: none; }

.compare__col,
.compare__label {
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--eco-muted);
}
.compare__col--us { color: var(--eco-forest); }

.compare__cell { display: flex; flex-direction: column; gap: 0.2rem; }
.compare__value {
  font-size: clamp(1.5rem, 3vw, 2rem);
  line-height: 1;
  font-weight: 600;
}
.compare__cell--us .compare__value { color: var(--eco-forest); }
.compare__cell--them .compare__value { color: var(--eco-muted); }
.compare__note { font-size: 0.875rem; color: var(--eco-graphite); }
.compare__cell--them .compare__note { color: var(--eco-muted); }

@media (max-width: 880px) {
  .tanques__body { grid-template-columns: 1fr; }
  .benefits { grid-template-columns: 1fr; }
  .compare__header, .compare__row { grid-template-columns: 90px 1fr 1fr; gap: 0.5rem; }
}
</style>
