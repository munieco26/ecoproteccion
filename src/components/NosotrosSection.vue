<script setup>
import { Motion } from 'motion-v'
import HexMotif from './HexMotif.vue'

const clients = [
  'Particulares', 'Consorcios', 'Hospitales', 'Empresas',
  'Hoteles', 'Restaurantes', 'Establecimientos alimenticios',
  'Countries', 'Clubes', 'Espacios verdes', 'Oficinas',
  'Consultorios', 'Instituciones educativas',
]

const gear = [
  { icon: 'masks',                label: 'Máscaras de carbono activado' },
  { icon: 'health_and_safety',    label: 'Guantes de protección química' },
  { icon: 'engineering',          label: 'Indumentaria específica' },
  { icon: 'verified',             label: 'Productos SENASA + ANMAT' },
]
</script>

<template>
  <section id="nosotros" class="nos">
    <HexMotif position="tr" variant="solid" :size="240" :opacity="0.95" />

    <div class="container">
      <div class="section-head">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ y: 6 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6 }"
        >Quiénes somos</Motion>

        <Motion
          as="h2"
          class="section-head__title display"
          :initial="{ y: 24 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.1 }"
        >
          Una empresa<br/>
          <em>de servicio integral.</em>
        </Motion>
      </div>
    </div>

    <!-- Manifesto + photo -->
    <div class="container nos__body">
      <Motion
        class="manifesto"
        :initial="{ y: 24 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <span class="manifesto__quote">“</span>
        <div class="manifesto__body">
          <p>
            <em>Protegemos al cliente</em> brindando conocimiento y tranquilidad
            sobre cada problema que se presente. Trabajamos con equipamiento y
            productos aprobados, seguros y confiables, con atención personalizada de
            expertos capacitados.
          </p>
          <p>
            Buscamos reducir al máximo la aplicación de productos tóxicos —para
            prevenir su exposición al contacto humano— a través de mejoras
            ambientales, culturales y de infraestructura.
          </p>
        </div>
      </Motion>

      <Motion
        class="nos__photo"
        :initial="{ y: 24 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.9 }"
      >
        <img src="/assets/photos/fumigacion-jardin.png" alt="Operador de Ecoprotección en campo" />
        <div class="nos__photo-tag">
          <span class="mono">Operativo en campo</span>
          <span class="mono">04A</span>
        </div>
      </Motion>
    </div>

    <!-- Clients -->
    <div class="container">
      <Motion
        class="clients"
        :initial="{ y: 6 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.6 }"
      >
        <div class="clients__head">
          <span class="eyebrow">Quiénes nos eligen</span>
          <h3 class="clients__title display">
            Trabajamos con quienes<br/>
            <em>no pueden darse el lujo de fallar.</em>
          </h3>
        </div>

        <div class="clients__chips">
          <Motion
            v-for="(c, i) in clients"
            :key="c"
            class="chip"
            :initial="{ y: 10 }"
            :while-in-view="{ y: 0 }"
            :in-view-options="{ once: true }"
            :transition="{ duration: 0.4, delay: i * 0.03 }"
          >
            <span class="chip__dot"></span>{{ c }}
          </Motion>
        </div>
      </Motion>
    </div>

    <!-- Safety + Registries -->
    <div class="container nos__safety">
      <Motion
        class="safety"
        :initial="{ y: 24 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <span class="eyebrow">Seguridad y medio ambiente</span>
        <h3 class="safety__title display">
          Cada servicio empieza<br/>
          por <em>protegernos.</em>
        </h3>
        <p>
          Los productos para fumigación son de baja toxicidad y menor impacto
          ambiental, de marcas reconocidas. El personal utiliza en cada servicio
          equipos de protección certificados.
        </p>
        <div class="safety__gear">
          <div v-for="g in gear" :key="g.label" class="gear">
            <span class="mi mi-out">{{ g.icon }}</span>
            <span>{{ g.label }}</span>
          </div>
        </div>
      </Motion>

      <Motion
        class="badges"
        :initial="{ y: 24 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8, delay: 0.1 }"
      >
        <div class="badge badge--solid">
          <span class="badge__top mono">Registro</span>
          <span class="badge__n display">730</span>
          <span class="badge__bot">SENASA · habilitado</span>
        </div>
        <div class="badge">
          <span class="badge__top mono">Registro</span>
          <span class="badge__n display">988</span>
          <span class="badge__bot">ANMAT · habilitado</span>
        </div>
        <div class="badge badge--ghost">
          <span class="badge__top mono">Desde</span>
          <span class="badge__n display">2009</span>
          <span class="badge__bot">en operaciones</span>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.nos {
  padding: clamp(5rem, 9vw, 7.5rem) 0 6rem;
  background: var(--eco-bone);
  position: relative;
  overflow: hidden;
}

/* Manifesto */
.nos__body {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: clamp(2rem, 5vw, 4rem);
  align-items: start;
  margin-bottom: 5rem;
}

.manifesto { position: relative; }
.manifesto__quote {
  font-family: var(--font-display);
  font-style: italic;
  font-size: clamp(7rem, 14vw, 11rem);
  color: var(--eco-forest);
  line-height: 0.7;
  display: block;
  height: 0.45em;
  overflow: visible;
  font-weight: 500;
}
.manifesto__body {
  margin-top: 0.25rem;
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
  font-family: var(--font-display);
  font-weight: 400;
  font-size: clamp(1.15rem, 1.8vw, 1.5rem);
  line-height: 1.5;
  color: var(--eco-ink);
  letter-spacing: -0.005em;
}
.manifesto__body em {
  font-style: italic;
  color: var(--eco-forest);
  font-weight: 500;
}

.nos__photo {
  position: relative;
  aspect-ratio: 4/5;
  overflow: hidden;
  background: var(--eco-fog);
  border-radius: var(--r-lg);
  border: 1px solid var(--eco-line);
}
.nos__photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: saturate(0.95);
}
.nos__photo-tag {
  position: absolute;
  left: 1rem;
  bottom: 1rem;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.5rem 0.8rem;
  background: var(--eco-ink);
  color: var(--eco-bone);
  border-radius: 999px;
  font-size: 0.6875rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
}
.nos__photo-tag .mono:last-child {
  color: var(--eco-leaf);
  border-left: 1px solid rgba(247, 244, 236, 0.25);
  padding-left: 0.5rem;
}

/* Clients */
.clients {
  border-top: 1px solid var(--eco-line);
  padding-top: 3rem;
  margin-bottom: 5rem;
}
.clients__head { margin-bottom: 2rem; }
.clients__title {
  font-size: clamp(1.5rem, 3.2vw, 2.25rem);
  margin-top: 0.75rem;
  max-width: 26ch;
}
.clients__chips { display: flex; flex-wrap: wrap; gap: 0.5rem; }
.chip {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.55rem 1rem;
  font-size: 0.9rem;
  color: var(--eco-ink);
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: 999px;
  cursor: default;
  transition: border-color 0.25s, transform 0.25s, color 0.25s;
}
.chip:hover {
  border-color: var(--eco-forest);
  color: var(--eco-forest);
  transform: translateY(-2px);
}
.chip__dot {
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: var(--eco-forest);
}

/* Safety + badges */
.nos__safety {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: clamp(2rem, 5vw, 3.5rem);
  align-items: stretch;
  padding-top: 3rem;
  border-top: 1px solid var(--eco-line);
}

.safety__title {
  font-size: clamp(1.75rem, 3.4vw, 2.5rem);
  margin: 0.75rem 0 1rem;
}
.safety > p {
  color: var(--eco-graphite);
  max-width: 56ch;
  margin-bottom: 1.75rem;
  font-size: 1rem;
}
.safety__gear {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.85rem;
}
.gear {
  display: flex;
  align-items: center;
  gap: 0.85rem;
  padding: 1rem 1.1rem;
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-md);
  font-size: 0.9375rem;
  color: var(--eco-ink);
  transition: border-color 0.3s, transform 0.3s;
}
.gear:hover { border-color: var(--eco-forest); transform: translateY(-2px); }
.gear .mi {
  font-size: 1.6rem;
  color: var(--eco-forest);
  flex-shrink: 0;
}

.badges {
  display: grid;
  grid-template-columns: 1fr;
  gap: 0.75rem;
}
.badge {
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-md);
  padding: 1.5rem;
  display: grid;
  grid-template-columns: 1fr auto;
  grid-template-rows: auto auto;
  gap: 0.1rem 1rem;
  align-items: end;
  position: relative;
  overflow: hidden;
}
.badge--solid {
  background: var(--eco-ink);
  border-color: var(--eco-ink);
  color: var(--eco-bone);
}
.badge--ghost { background: transparent; border-style: dashed; }

.badge__top {
  grid-column: 1; grid-row: 1;
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--eco-muted);
}
.badge--solid .badge__top { color: var(--eco-leaf); }
.badge__n {
  grid-column: 2; grid-row: 1 / 3;
  font-size: clamp(3rem, 6vw, 4.5rem);
  color: var(--eco-forest);
  line-height: 0.85;
  font-weight: 600;
  letter-spacing: -0.03em;
}
.badge--solid .badge__n { color: var(--eco-bone); }
.badge--ghost .badge__n { color: var(--eco-graphite); }
.badge__bot {
  grid-column: 1; grid-row: 2;
  font-size: 0.85rem;
  color: var(--eco-ink);
}
.badge--solid .badge__bot { color: rgba(247, 244, 236, 0.85); }

@media (max-width: 980px) {
  .nos__body { grid-template-columns: 1fr; gap: 2.5rem; }
  .nos__safety { grid-template-columns: 1fr; }
  .safety__gear { grid-template-columns: 1fr; }
}
</style>
