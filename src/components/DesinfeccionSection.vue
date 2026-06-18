<script setup>
import { Motion } from 'motion-v'
import HexMotif from './HexMotif.vue'

const services = [
  {
    code: 'D-01',
    title: 'Desinfección',
    icon: 'pest_control',
    blurb: 'Fumigación profesional para control efectivo de insectos en hogares, oficinas, restaurantes y consorcios.',
    targets: ['Cucarachas', 'Hormigas', 'Pulgas', 'Polillas', 'Arañas', 'Otros insectos'],
    method: 'Aplicación dirigida a focos y rutas de paso, con principios activos residuales de baja toxicidad.',
  },
  {
    code: 'D-02',
    title: 'Desinsectación',
    icon: 'biotech',
    blurb: 'Tratamiento integral con amonio cuaternario contra hongos, virus y bacterias en superficies y ambientes.',
    targets: ['Virus', 'Bacterias', 'Hongos', 'Patógenos', 'Esporas', 'Biofilm'],
    method: 'Producto sin olor desagradable, sin secado posterior y no tóxico. Apto para clínicas y gastronomía.',
  },
  {
    code: 'D-03',
    title: 'Desratización',
    icon: 'crisis_alert',
    blurb: 'Programa contra roedores con estaciones de cebado seguras y monitoreo periódico de actividad.',
    targets: ['Ratas', 'Ratones', 'Roedores urbanos'],
    method: 'Cebos monodósicos y polidósicos en estaciones cerradas. Sistemas adicionales de trampas pegamentosas.',
  },
]

const photos = [
  '/assets/photos/fumigacion-patio.png',
  '/assets/photos/fumigacion-club.png',
  '/assets/photos/fumigacion-jardin.png',
]
</script>

<template>
  <section id="desinfeccion" class="desinf">
    <HexMotif position="tr" variant="thin" :size="200" :opacity="0.45" />

    <div class="container">
      <div class="section-head">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ y: 6 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6 }"
        >Control de plagas y desinfección</Motion>

        <Motion
          as="h2"
          class="section-head__title display"
          :initial="{ y: 24 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.1 }"
        >
          Tres frentes,<br/>
          <em>un mismo equipo.</em>
        </Motion>

        <Motion
          as="p"
          class="body-lg section-head__lede"
          :initial="{ y: 16 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.2 }"
        >
          Productos aprobados por SENASA y ANMAT, de marcas reconocidas y baja
          toxicidad. El personal opera con máscaras de carbono activado, guantes y
          ropa específica para cada servicio.
        </Motion>
      </div>
    </div>

    <div class="container desinf__grid">
      <Motion
        v-for="(s, i) in services"
        :key="s.code"
        class="card"
        :initial="{ y: 32 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
        :transition="{ duration: 0.7, delay: i * 0.1 }"
        :while-hover="{ y: -6 }"
      >
        <div class="card__top">
          <span class="card__icon">
            <span class="mi mi-out">{{ s.icon }}</span>
          </span>
        </div>

        <h3 class="card__title display">{{ s.title }}</h3>
        <p class="card__blurb">{{ s.blurb }}</p>

        <div class="card__section">
          <span class="card__label mono">Objetivos</span>
          <ul class="card__targets">
            <li v-for="t in s.targets" :key="t">
              <span class="card__dot"></span>{{ t }}
            </li>
          </ul>
        </div>

        <div class="card__section">
          <span class="card__label mono">Método</span>
          <p class="card__method">{{ s.method }}</p>
        </div>

        <div class="card__foot mono">
          Reg. 730 · 988 · SENASA / ANMAT
        </div>
      </Motion>
    </div>

    <!-- Antiviral callout -->
    <div class="container">
      <Motion
        class="antiviral eco-band"
        :initial="{ y: 32 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="antiviral__left">
          <span class="eyebrow eyebrow--light">Servicio extendido</span>
          <h3 class="antiviral__title display">
            Desinfección antiviral<br/>
            <em>con amonio cuaternario.</em>
          </h3>
          <p>
            Combate todo tipo de virus y bacterias en hogares, consorcios, consultorios,
            oficinas, clubes, gastronomía e instituciones educativas. No requiere
            secado posterior, no es tóxico ni tiene olor desagradable.
          </p>
          <div class="antiviral__tags">
            <span class="tag">No tóxico</span>
            <span class="tag">Sin olor</span>
            <span class="tag">Sin secado</span>
            <span class="tag">SENASA · ANMAT</span>
          </div>
        </div>

        <div class="antiviral__visual">
          <svg viewBox="0 0 220 220" class="virus" aria-hidden="true">
            <g transform="translate(110, 110)">
              <circle r="48" fill="none" stroke="rgba(247,244,236,0.65)" stroke-width="1.5"/>
              <circle r="46" fill="rgba(247,244,236,0.06)"/>
              <g class="virus__spikes">
                <g v-for="n in 16" :key="`g${n}`" :transform="`rotate(${n * 22.5})`">
                  <line x1="0" y1="-50" x2="0" y2="-66" stroke="rgba(247,244,236,0.85)" stroke-width="1.5" stroke-linecap="round"/>
                  <circle cx="0" cy="-68" r="3" fill="#F7F4EC"/>
                </g>
              </g>
              <text font-family="IBM Plex Mono" font-size="9" fill="#F7F4EC" text-anchor="middle" y="-2" letter-spacing="2">NEUTRALIZADO</text>
              <text font-family="Fraunces" font-size="26" font-weight="600" fill="#F7F4EC" text-anchor="middle" y="22">100%</text>
              <line x1="-58" y1="58" x2="58" y2="-58" stroke="#F7F4EC" stroke-width="2" opacity="0.45"/>
            </g>
          </svg>
        </div>
      </Motion>
    </div>

    <!-- Photo strip -->
    <div class="photo-strip">
      <Motion
        v-for="(p, i) in photos"
        :key="p"
        class="frame"
        :initial="{ y: 30 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
        :transition="{ duration: 0.7, delay: i * 0.1 }"
      >
        <img :src="p" :alt="`Operativo ${i + 1}`" loading="lazy" />
        <div class="frame__mark">
          <span class="mono">Frame {{ String(i + 1).padStart(2, '0') }} / 03</span>
          <span class="mono">{{ ['Exterior · día', 'Interior · club', 'Jardín · día'][i] }}</span>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.desinf {
  padding: clamp(5rem, 9vw, 7.5rem) 0 6rem;
  background: var(--eco-bone);
  position: relative;
  overflow: hidden;
}

/* Cards grid */
.desinf__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.25rem;
  margin-bottom: 5rem;
}

.card {
  position: relative;
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-md);
  padding: 1.75rem;
  display: flex;
  flex-direction: column;
  transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s;
}
.card:hover {
  border-color: rgba(30, 122, 51, 0.4);
  box-shadow: var(--shadow-card);
}

.card__top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 1.25rem;
}
.card__code {
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  color: var(--eco-muted);
  text-transform: uppercase;
}
.card__icon {
  width: 48px;
  height: 48px;
  display: grid;
  place-items: center;
  background: var(--eco-moss);
  color: var(--eco-forest);
  border-radius: 14px;
}
.card__icon .mi { font-size: 1.5rem; }

.card__title {
  font-size: clamp(1.5rem, 2.4vw, 1.875rem);
  color: var(--eco-ink);
  margin-bottom: 0.55rem;
}
.card__blurb {
  font-size: 0.9375rem;
  color: var(--eco-graphite);
  line-height: 1.55;
  margin-bottom: 1.4rem;
}

.card__section { margin-bottom: 1.2rem; }
.card__label {
  display: block;
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--eco-forest);
  margin-bottom: 0.55rem;
}

.card__targets {
  list-style: none;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.3rem 0.75rem;
}
.card__targets li {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.875rem;
  color: var(--eco-ink);
}
.card__dot {
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: var(--eco-forest);
  flex-shrink: 0;
}

.card__method {
  font-size: 0.875rem;
  color: var(--eco-graphite);
  line-height: 1.55;
}

.card__foot {
  margin-top: auto;
  padding-top: 1.25rem;
  border-top: 1px dashed var(--eco-line);
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--eco-muted);
}

/* Antiviral */
.antiviral {
  display: grid;
  grid-template-columns: 1.5fr 1fr;
  gap: 3rem;
  align-items: center;
  border-radius: var(--r-lg);
  padding: clamp(2rem, 4vw, 3.5rem);
  margin-bottom: 5rem;
}
.eyebrow--light { color: var(--eco-bone); }
.eyebrow--light::before { background: var(--eco-bone); }

.antiviral__title {
  font-size: clamp(1.85rem, 3.6vw, 2.75rem);
  margin: 0.75rem 0 1rem;
  color: var(--eco-bone);
}
.antiviral__title em {
  color: var(--eco-bone);
  font-style: italic;
}
.antiviral__left p {
  color: rgba(247, 244, 236, 0.86);
  max-width: 60ch;
  margin-bottom: 1.5rem;
}
.antiviral__tags { display: flex; flex-wrap: wrap; gap: 0.45rem; }
.tag {
  font-size: 0.75rem;
  font-weight: 500;
  padding: 0.4rem 0.85rem;
  border: 1px solid rgba(247, 244, 236, 0.45);
  color: var(--eco-bone);
  border-radius: 999px;
}
.antiviral__visual { display: grid; place-items: center; }
.virus { width: 100%; max-width: 300px; height: auto; }
.virus__spikes { animation: spin 32s linear infinite; transform-origin: center; }
@keyframes spin { to { transform: rotate(360deg); } }

/* Photo strip */
.photo-strip {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.25rem;
  padding-inline: var(--gutter);
  max-width: var(--max);
  margin: 0 auto;
}
.frame {
  position: relative;
  aspect-ratio: 4/3;
  overflow: hidden;
  border-radius: var(--r-md);
  background: var(--eco-fog);
  border: 1px solid var(--eco-line);
}
.frame img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s, filter 0.6s;
  filter: saturate(0.95);
}
.frame:hover img { transform: scale(1.04); filter: saturate(1.05); }
.frame__mark {
  position: absolute;
  inset: auto 0 0 0;
  display: flex;
  justify-content: space-between;
  padding: 0.75rem 1rem;
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--eco-bone);
  background: linear-gradient(0deg, rgba(11, 20, 16, 0.7), transparent);
}

@media (max-width: 980px) {
  .desinf__grid { grid-template-columns: 1fr; }
  .antiviral { grid-template-columns: 1fr; gap: 2rem; }
  .photo-strip { grid-template-columns: 1fr; }
}
</style>
