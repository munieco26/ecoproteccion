<script setup>
import { Motion } from 'motion-v'

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
    blurb: 'Programa contra roedores con estaciones de cebado seguras + monitoreo de actividad.',
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
    <div class="hazard-tape"></div>

    <div class="container desinf__head">
      <Motion
        as="div"
        class="act-mark"
        :initial="{ opacity: 0, x: -40 }"
        :while-in-view="{ opacity: 1, x: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.7 }"
      >
        <span class="act-mark__num display">02</span>
        <span class="act-mark__label mono">ACTO SEGUNDO</span>
      </Motion>

      <div class="desinf__heading">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ opacity: 0 }"
          :while-in-view="{ opacity: 1 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6, delay: 0.1 }"
        >Control de plagas y desinfección</Motion>

        <Motion
          as="h2"
          class="desinf__title display"
          :initial="{ opacity: 0, y: 30 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.15 }"
        >
          Tres frentes.<br/>
          <em>Un mismo equipo.</em>
        </Motion>

        <Motion
          as="p"
          class="body-lg desinf__lede"
          :initial="{ opacity: 0, y: 20 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.3 }"
        >
          Productos aprobados por SENASA y ANMAT, de marcas reconocidas y baja toxicidad. El
          personal opera con máscaras de carbono activado, guantes y ropa específica para
          cada servicio.
        </Motion>
      </div>
    </div>

    <div class="container desinf__grid">
      <Motion
        v-for="(s, i) in services"
        :key="s.code"
        class="dossier"
        :initial="{ opacity: 0, y: 50 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
        :transition="{ duration: 0.7, delay: i * 0.12 }"
        :while-hover="{ y: -8 }"
      >
        <div class="dossier__top">
          <span class="dossier__code mono">{{ s.code }}</span>
          <span class="dossier__stamp mono">CLASIFICADO</span>
        </div>

        <div class="dossier__icon">
          <span class="mi mi-out">{{ s.icon }}</span>
        </div>

        <h3 class="dossier__title display">{{ s.title }}</h3>
        <p class="dossier__blurb">{{ s.blurb }}</p>

        <div class="dossier__section">
          <span class="dossier__label mono">→ Objetivos</span>
          <ul class="dossier__targets">
            <li v-for="t in s.targets" :key="t">
              <span class="mi">close</span>
              {{ t }}
            </li>
          </ul>
        </div>

        <div class="dossier__section">
          <span class="dossier__label mono">→ Método</span>
          <p class="dossier__method">{{ s.method }}</p>
        </div>

        <div class="dossier__bottom mono">
          REG. 730 + 988 · SENASA / ANMAT
        </div>
      </Motion>
    </div>

    <!-- Antiviral callout -->
    <div class="container">
      <Motion
        class="antiviral"
        :initial="{ opacity: 0, scale: 0.96 }"
        :while-in-view="{ opacity: 1, scale: 1 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="antiviral__left">
          <span class="eyebrow">Servicio extendido</span>
          <h3 class="antiviral__title display">
            Desinfección antiviral<br/>
            <em>con amonio cuaternario.</em>
          </h3>
          <p>
            Combate todo tipo de virus y bacterias en hogares, consorcios, consultorios,
            oficinas, clubes, gastronomía e instituciones educativas. No requiere secado
            posterior, no es tóxico ni tiene olor desagradable.
          </p>
          <div class="antiviral__tags">
            <span class="tag mono">No tóxico</span>
            <span class="tag mono">Sin olor</span>
            <span class="tag mono">Sin secado</span>
            <span class="tag mono">SENASA / ANMAT</span>
          </div>
        </div>

        <div class="antiviral__visual">
          <svg viewBox="0 0 200 200" class="virus" aria-hidden="true">
            <g transform="translate(100, 100)">
              <circle r="40" fill="none" stroke="#7ED321" stroke-width="1.5"/>
              <circle r="38" fill="rgba(126, 211, 33, 0.08)"/>
              <g class="virus__spikes">
                <line v-for="n in 16" :key="n" x1="0" :y1="-42" x2="0" :y2="-56"
                      :transform="`rotate(${n * 22.5})`"
                      stroke="#7ED321" stroke-width="1.5" stroke-linecap="round"/>
                <circle v-for="n in 16" :key="`c${n}`" cx="0" cy="-58" r="3"
                        :transform="`rotate(${n * 22.5})`"
                        fill="#7ED321"/>
              </g>
              <text font-family="JetBrains Mono" font-size="9" fill="#7ED321" text-anchor="middle" y="-2" letter-spacing="2">NEUTRALIZADO</text>
              <text font-family="Big Shoulders Display" font-size="22" font-weight="900" fill="#7ED321" text-anchor="middle" y="20">100%</text>
              <line x1="-50" y1="50" x2="50" y2="-50" stroke="#C2492A" stroke-width="3" opacity="0.7"/>
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
        class="photo-strip__frame"
        :initial="{ opacity: 0, y: 40 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -80px 0px' }"
        :transition="{ duration: 0.7, delay: i * 0.1 }"
      >
        <img :src="p" :alt="`Fumigación ${i + 1}`" loading="lazy"/>
        <div class="photo-strip__mark">
          <span class="mono">FRAME {{ String(i + 1).padStart(3, '0') }} / 003</span>
          <span class="mono">{{ ['EXTERIOR · DÍA', 'INTERIOR · CLUB', 'JARDÍN · DÍA'][i] }}</span>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.desinf {
  padding-bottom: 6rem;
  background: var(--eco-deep);
  position: relative;
}

.desinf__head {
  padding-top: 6rem;
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 3rem;
  align-items: start;
  margin-bottom: 4rem;
}

.act-mark {
  border-left: 2px solid var(--eco-lime);
  padding-left: 1.25rem;
}
.act-mark__num {
  font-size: clamp(4rem, 8vw, 7rem);
  color: var(--eco-lime);
  line-height: 0.8;
  display: block;
}
.act-mark__label {
  display: block;
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.55);
  margin-top: 0.4rem;
}

.desinf__heading { padding-top: 0.75rem; }
.desinf__title {
  font-size: clamp(2.25rem, 5.5vw, 4.75rem);
  margin: 1rem 0 1.5rem;
  color: var(--eco-bone);
}
.desinf__title em { font-style: italic; color: var(--eco-lime); font-weight: 800; }
.desinf__lede { max-width: 56ch; }

/* Dossier cards */
.desinf__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.25rem;
  margin-bottom: 5rem;
}

.dossier {
  position: relative;
  background:
    linear-gradient(180deg, rgba(126, 211, 33, 0.04), transparent),
    var(--eco-ink);
  border: 1px solid rgba(244, 241, 232, 0.1);
  padding: 2rem 1.75rem 1.25rem;
  display: flex;
  flex-direction: column;
  transition: border-color 0.3s;
  cursor: default;
}
.dossier:hover {
  border-color: var(--eco-lime);
}
.dossier::before {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 4px;
  background: var(--eco-lime);
  transform-origin: left;
  transform: scaleX(0.2);
  transition: transform 0.5s;
}
.dossier:hover::before { transform: scaleX(1); }

.dossier__top {
  display: flex;
  justify-content: space-between;
  font-size: 0.6875rem;
  letter-spacing: 0.16em;
  color: rgba(244, 241, 232, 0.4);
  margin-bottom: 1.5rem;
}
.dossier__code { color: var(--eco-lime); }
.dossier__stamp {
  border: 1px solid rgba(126, 211, 33, 0.4);
  padding: 0.15rem 0.45rem;
  font-size: 0.625rem;
  color: var(--eco-lime);
  text-transform: uppercase;
}

.dossier__icon {
  width: 56px;
  height: 56px;
  display: grid;
  place-items: center;
  background: rgba(126, 211, 33, 0.1);
  color: var(--eco-lime);
  margin-bottom: 1.25rem;
}
.dossier__icon .mi { font-size: 2rem; }

.dossier__title {
  font-size: clamp(1.5rem, 2.4vw, 2rem);
  color: var(--eco-bone);
  margin-bottom: 0.625rem;
}
.dossier__blurb {
  font-size: 0.9375rem;
  color: var(--eco-cream);
  line-height: 1.55;
  margin-bottom: 1.5rem;
}

.dossier__section { margin-bottom: 1.25rem; }
.dossier__label {
  display: block;
  font-size: 0.6875rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--eco-lime);
  margin-bottom: 0.6rem;
}

.dossier__targets {
  list-style: none;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.35rem 0.75rem;
}
.dossier__targets li {
  display: flex;
  align-items: center;
  gap: 0.4rem;
  font-size: 0.875rem;
  color: var(--eco-bone);
}
.dossier__targets li .mi {
  font-size: 0.875rem;
  color: var(--eco-rust);
}

.dossier__method {
  font-size: 0.875rem;
  color: var(--eco-cream);
  line-height: 1.5;
}

.dossier__bottom {
  margin-top: auto;
  padding-top: 1.25rem;
  border-top: 1px dashed rgba(244, 241, 232, 0.1);
  font-size: 0.625rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.4);
}

/* Antiviral */
.antiviral {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: 3rem;
  align-items: center;
  background:
    linear-gradient(135deg, rgba(126, 211, 33, 0.08), rgba(126, 211, 33, 0)),
    var(--eco-ink);
  border: 1px solid rgba(126, 211, 33, 0.25);
  padding: clamp(2rem, 4vw, 3.5rem);
  position: relative;
  overflow: hidden;
  margin-bottom: 5rem;
}
.antiviral::before {
  content: '';
  position: absolute;
  top: -1px; left: -1px;
  width: 36px; height: 36px;
  border-top: 3px solid var(--eco-lime);
  border-left: 3px solid var(--eco-lime);
}
.antiviral::after {
  content: '';
  position: absolute;
  bottom: -1px; right: -1px;
  width: 36px; height: 36px;
  border-bottom: 3px solid var(--eco-lime);
  border-right: 3px solid var(--eco-lime);
}
.antiviral__title {
  font-size: clamp(1.75rem, 3.5vw, 2.75rem);
  margin: 0.75rem 0 1rem;
  color: var(--eco-bone);
}
.antiviral__title em { font-style: italic; color: var(--eco-lime); }
.antiviral__left p {
  color: var(--eco-cream);
  max-width: 60ch;
  margin-bottom: 1.5rem;
}
.antiviral__tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}
.tag {
  font-size: 0.6875rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  padding: 0.4rem 0.8rem;
  border: 1px solid rgba(126, 211, 33, 0.4);
  color: var(--eco-lime);
}
.antiviral__visual {
  display: grid;
  place-items: center;
}
.virus {
  width: 100%;
  max-width: 280px;
  height: auto;
}
.virus__spikes { animation: spin 30s linear infinite; transform-origin: center; }
@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Photo strip */
.photo-strip {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 4px;
  padding: 0;
  background: var(--eco-ink);
  border-top: 1px solid rgba(244, 241, 232, 0.08);
  border-bottom: 1px solid rgba(244, 241, 232, 0.08);
}
.photo-strip__frame {
  position: relative;
  aspect-ratio: 4/3;
  overflow: hidden;
  background: #000;
}
.photo-strip__frame img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: contrast(1.1) saturate(0.9);
  transition: transform 0.6s, filter 0.6s;
}
.photo-strip__frame:hover img {
  transform: scale(1.04);
  filter: contrast(1.15) saturate(1.2);
}
.photo-strip__mark {
  position: absolute;
  inset: auto 0 0 0;
  display: flex;
  justify-content: space-between;
  padding: 0.75rem 1rem;
  font-size: 0.625rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--eco-lime);
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.75), transparent);
}

@media (max-width: 980px) {
  .desinf__head { grid-template-columns: 1fr; gap: 1.5rem; }
  .desinf__grid { grid-template-columns: 1fr; }
  .antiviral { grid-template-columns: 1fr; }
  .photo-strip { grid-template-columns: 1fr; }
}
</style>
