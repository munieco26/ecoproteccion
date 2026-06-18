<script setup>
import { Motion } from 'motion-v'

const clients = [
  'Particulares', 'Consorcios', 'Hospitales', 'Empresas',
  'Hoteles', 'Restaurantes', 'Establecimientos alimenticios',
  'Countries', 'Clubes', 'Espacios verdes', 'Oficinas',
  'Consultorios', 'Instituciones educativas',
]

const gear = [
  { icon: 'masks', label: 'Máscaras de carbono activado' },
  { icon: 'health_and_safety', label: 'Guantes de protección química' },
  { icon: 'engineering', label: 'Indumentaria específica' },
  { icon: 'verified', label: 'Productos SENASA + ANMAT' },
]
</script>

<template>
  <section id="nosotros" class="nos">
    <div class="hazard-tape"></div>

    <div class="container nos__head">
      <Motion
        as="div"
        class="act-mark"
        :initial="{ opacity: 0, x: -40 }"
        :while-in-view="{ opacity: 1, x: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.7 }"
      >
        <span class="act-mark__num display">04</span>
        <span class="act-mark__label mono">ACTO CUARTO</span>
      </Motion>

      <div class="nos__heading">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ opacity: 0 }"
          :while-in-view="{ opacity: 1 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6, delay: 0.1 }"
        >Nosotros</Motion>

        <Motion
          as="h2"
          class="nos__title display"
          :initial="{ opacity: 0, y: 30 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.15 }"
        >
          Una empresa<br/>
          <em>de servicio integral.</em>
        </Motion>
      </div>
    </div>

    <!-- Mission -->
    <div class="container nos__body">
      <Motion
        class="manifesto"
        :initial="{ opacity: 0, y: 30 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <span class="manifesto__quote display">“</span>
        <div class="manifesto__body">
          <p>
            <em>Protegemos al cliente</em> brindando conocimiento y tranquilidad sobre
            cada problema que se presente. Trabajamos con equipamiento y productos
            aprobados, seguros y confiables, con atención personalizada de expertos
            capacitados.
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
        :initial="{ opacity: 0, scale: 0.95 }"
        :while-in-view="{ opacity: 1, scale: 1 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.9 }"
      >
        <img src="/assets/photos/fumigacion-jardin.png" alt="Operador de Ecoprotección trabajando en jardín" />
        <div class="nos__photo-frame"></div>
        <div class="nos__photo-tag mono">
          FILE 04A · OPERATIVO EN CAMPO
        </div>
      </Motion>
    </div>

    <!-- Clients chips -->
    <div class="container">
      <Motion
        class="clients"
        :initial="{ opacity: 0 }"
        :while-in-view="{ opacity: 1 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.6 }"
      >
        <div class="clients__head">
          <span class="eyebrow">Quiénes nos eligen</span>
          <h3 class="clients__title display">
            Trabajamos con quien<br/>
            no puede darse el lujo de fallar.
          </h3>
        </div>

        <div class="clients__chips">
          <Motion
            v-for="(c, i) in clients"
            :key="c"
            class="chip"
            :initial="{ opacity: 0, y: 14 }"
            :while-in-view="{ opacity: 1, y: 0 }"
            :in-view-options="{ once: true }"
            :transition="{ duration: 0.4, delay: i * 0.03 }"
            :while-hover="{ scale: 1.06, color: '#7ED321' }"
          >
            <span class="chip__bullet">●</span>
            {{ c }}
          </Motion>
        </div>
      </Motion>
    </div>

    <!-- Safety + Registries -->
    <div class="container nos__safety">
      <Motion
        class="safety"
        :initial="{ opacity: 0, y: 30 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <span class="eyebrow">Seguridad y medio ambiente</span>
        <h3 class="safety__title display">
          Cada servicio<br/>
          empieza por <em>protegernos</em>.
        </h3>
        <p>
          Los productos para fumigación son de baja toxicidad y menor impacto ambiental,
          de marcas reconocidas. El personal utiliza en cada servicio equipos de
          protección certificados.
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
        :initial="{ opacity: 0, y: 30 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8, delay: 0.1 }"
      >
        <div class="badge">
          <span class="badge__top mono">REGISTRO</span>
          <span class="badge__n display">730</span>
          <span class="badge__bot mono">SENASA · habilitado</span>
        </div>
        <div class="badge">
          <span class="badge__top mono">REGISTRO</span>
          <span class="badge__n display">988</span>
          <span class="badge__bot mono">ANMAT · habilitado</span>
        </div>
        <div class="badge badge--ghost">
          <span class="badge__top mono">DESDE</span>
          <span class="badge__n display">2009</span>
          <span class="badge__bot mono">en operaciones</span>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.nos {
  padding-bottom: 6rem;
  background: var(--eco-deep);
}

.nos__head {
  padding-top: 6rem;
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 3rem;
  align-items: start;
  margin-bottom: 4rem;
}
.act-mark { border-left: 2px solid var(--eco-lime); padding-left: 1.25rem; }
.act-mark__num { font-size: clamp(4rem, 8vw, 7rem); color: var(--eco-lime); line-height: 0.8; display: block; }
.act-mark__label { display: block; font-size: 0.6875rem; letter-spacing: 0.2em; text-transform: uppercase; color: rgba(244, 241, 232, 0.55); margin-top: 0.4rem; }

.nos__heading { padding-top: 0.75rem; }
.nos__title {
  font-size: clamp(2.25rem, 5.5vw, 4.75rem);
  margin: 1rem 0 1.5rem;
  color: var(--eco-bone);
}
.nos__title em { font-style: italic; color: var(--eco-lime); font-weight: 800; }

/* Body grid */
.nos__body {
  display: grid;
  grid-template-columns: 1.5fr 1fr;
  gap: 3.5rem;
  align-items: start;
  margin-bottom: 5rem;
}

.manifesto {
  position: relative;
  padding: 0;
}
.manifesto__quote {
  font-family: 'Big Shoulders Display';
  font-size: clamp(6rem, 14vw, 12rem);
  color: var(--eco-lime);
  line-height: 0.7;
  display: block;
  height: 0.6em;
  overflow: visible;
  opacity: 0.9;
}
.manifesto__body {
  margin-top: 0.5rem;
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
  font-size: clamp(1.0625rem, 1.5vw, 1.25rem);
  line-height: 1.6;
  color: var(--eco-cream);
}
.manifesto__body em {
  font-style: italic;
  color: var(--eco-bone);
  font-weight: 600;
}

.nos__photo {
  position: relative;
  aspect-ratio: 4/5;
  overflow: hidden;
  background: #000;
}
.nos__photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: grayscale(0.15) contrast(1.05);
}
.nos__photo-frame {
  position: absolute;
  inset: 12px;
  border: 1px dashed rgba(126, 211, 33, 0.55);
  pointer-events: none;
}
.nos__photo-tag {
  position: absolute;
  bottom: 1.25rem;
  left: 1.25rem;
  font-size: 0.625rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--eco-lime);
  background: rgba(5, 8, 5, 0.85);
  padding: 0.4rem 0.75rem;
  border: 1px solid var(--eco-lime);
}

/* Clients */
.clients {
  border-top: 1px solid rgba(244, 241, 232, 0.08);
  padding-top: 3.5rem;
  margin-bottom: 5rem;
}
.clients__head { margin-bottom: 2.5rem; }
.clients__title {
  font-size: clamp(1.5rem, 3vw, 2.25rem);
  margin-top: 0.75rem;
  color: var(--eco-bone);
}
.clients__chips {
  display: flex;
  flex-wrap: wrap;
  gap: 0.65rem;
}
.chip {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.6rem 1rem;
  font-size: 0.9375rem;
  color: var(--eco-bone);
  border: 1px solid rgba(244, 241, 232, 0.18);
  background: rgba(5, 8, 5, 0.4);
  cursor: default;
  transition: all 0.25s;
}
.chip:hover {
  border-color: var(--eco-lime);
  color: var(--eco-lime);
  transform: translateY(-2px);
}
.chip__bullet {
  color: var(--eco-lime);
  font-size: 0.5rem;
}

/* Safety + badges */
.nos__safety {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: 3rem;
  align-items: stretch;
  padding-top: 3rem;
  border-top: 1px solid rgba(244, 241, 232, 0.08);
}

.safety__title {
  font-size: clamp(1.75rem, 3.5vw, 2.75rem);
  color: var(--eco-bone);
  margin: 0.75rem 0 1rem;
}
.safety__title em { font-style: italic; color: var(--eco-lime); font-weight: 800; }
.safety > p {
  color: var(--eco-cream);
  max-width: 56ch;
  margin-bottom: 2rem;
}

.safety__gear {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}
.gear {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 1rem;
  background: var(--eco-ink);
  border: 1px solid rgba(244, 241, 232, 0.08);
  font-size: 0.9375rem;
  color: var(--eco-cream);
  transition: border-color 0.3s;
}
.gear:hover { border-color: var(--eco-lime); }
.gear .mi {
  font-size: 1.75rem;
  color: var(--eco-lime);
  flex-shrink: 0;
}

.badges {
  display: grid;
  grid-template-columns: 1fr;
  gap: 0.75rem;
}
.badge {
  background: var(--eco-ink);
  border: 1px solid rgba(126, 211, 33, 0.25);
  padding: 1.5rem;
  display: grid;
  grid-template-columns: 1fr auto;
  grid-template-rows: auto auto;
  gap: 0 1rem;
  align-items: end;
  position: relative;
}
.badge::before {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 3px;
  background: var(--eco-lime);
}
.badge--ghost { border-style: dashed; }
.badge--ghost::before { background: rgba(126, 211, 33, 0.5); }
.badge__top {
  grid-column: 1;
  grid-row: 1;
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  color: var(--eco-lime);
  text-transform: uppercase;
}
.badge__n {
  grid-column: 2;
  grid-row: 1 / 3;
  font-size: clamp(3rem, 6vw, 4.5rem);
  color: var(--eco-lime);
  line-height: 0.85;
  letter-spacing: -0.02em;
}
.badge__bot {
  grid-column: 1;
  grid-row: 2;
  font-size: 0.75rem;
  letter-spacing: 0.06em;
  color: var(--eco-bone);
  text-transform: uppercase;
}

@media (max-width: 980px) {
  .nos__head { grid-template-columns: 1fr; gap: 1.5rem; }
  .nos__body { grid-template-columns: 1fr; gap: 3rem; }
  .nos__safety { grid-template-columns: 1fr; }
  .safety__gear { grid-template-columns: 1fr; }
}
</style>
