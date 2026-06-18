<script setup>
const year = new Date().getFullYear()
</script>

<template>
  <footer class="ft">
    <div class="hazard-tape"></div>

    <div class="container ft__big">
      <h2 class="ft__bigtext display">
        ECO<em>PROTECCIÓN</em>
      </h2>
    </div>

    <div class="container ft__grid">
      <div class="ft__col">
        <img src="/assets/logo.png" alt="Ecoprotección" class="ft__logo"/>
        <p class="ft__txt">
          Control de plagas, limpieza y desinfección de tanques de agua potable.
          Productos aprobados SENASA / ANMAT.
        </p>
      </div>

      <div class="ft__col">
        <span class="ft__h mono">Capítulos</span>
        <ul>
          <li><a href="#tanques">01 · Limpieza de Tanques</a></li>
          <li><a href="#desinfeccion">02 · Desinfección</a></li>
          <li><a href="#mip">03 · MIP</a></li>
          <li><a href="#nosotros">04 · Nosotros</a></li>
          <li><a href="#contacto">05 · Contacto</a></li>
        </ul>
      </div>

      <div class="ft__col">
        <span class="ft__h mono">Contacto</span>
        <ul>
          <li><a href="https://wa.me/5491165029146" target="_blank" rel="noopener">WhatsApp · 11 6502-9146</a></li>
          <li><a href="mailto:info@ecoproteccion.com.ar">info@ecoproteccion.com.ar</a></li>
          <li><a href="https://www.instagram.com/ecoproteccion/" target="_blank" rel="noopener">Instagram · @ecoproteccion</a></li>
          <li><a href="https://www.facebook.com/ecoproteccion" target="_blank" rel="noopener">Facebook · /ecoproteccion</a></li>
        </ul>
      </div>

      <div class="ft__col">
        <span class="ft__h mono">Habilitaciones</span>
        <ul>
          <li>Registro N° 730 · SENASA</li>
          <li>Registro N° 988 · ANMAT</li>
          <li>Productos de baja toxicidad</li>
          <li>Equipos de protección certificados</li>
        </ul>
      </div>
    </div>

    <div class="container ft__bottom mono">
      <span>© {{ year }} Ecoprotección · Buenos Aires, AR</span>
      <span>Una historia contada en cinco actos.</span>
    </div>
  </footer>
</template>

<style scoped>
.ft {
  background: var(--eco-deep);
  border-top: 1px solid rgba(126, 211, 33, 0.18);
  padding-bottom: 2rem;
}
.ft__big {
  padding: 4rem 0 2.5rem;
  overflow: hidden;
  text-align: center;
}
.ft__bigtext {
  font-size: clamp(3.5rem, 14vw, 12rem);
  color: var(--eco-bone);
  letter-spacing: -0.03em;
  line-height: 0.85;
}
.ft__bigtext em {
  font-style: italic;
  color: var(--eco-lime);
  font-weight: 800;
}

.ft__grid {
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr 1fr;
  gap: 2rem;
  padding-top: 2.5rem;
  border-top: 1px solid rgba(244, 241, 232, 0.08);
  margin-bottom: 2.5rem;
}

.ft__col { display: flex; flex-direction: column; gap: 0.75rem; }
.ft__logo { height: 40px; width: auto; margin-bottom: 0.5rem; }
.ft__txt {
  font-size: 0.875rem;
  color: var(--eco-cream);
  line-height: 1.55;
  max-width: 38ch;
}
.ft__h {
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--eco-lime);
  margin-bottom: 0.5rem;
}
.ft__col ul { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; }
.ft__col li {
  font-size: 0.875rem;
  color: var(--eco-cream);
}
.ft__col li a { transition: color 0.25s; }
.ft__col li a:hover { color: var(--eco-lime); }

.ft__bottom {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  flex-wrap: wrap;
  padding-top: 1.5rem;
  border-top: 1px dashed rgba(244, 241, 232, 0.1);
  font-size: 0.6875rem;
  letter-spacing: 0.14em;
  color: rgba(244, 241, 232, 0.45);
  text-transform: uppercase;
}

@media (max-width: 880px) {
  .ft__grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 560px) {
  .ft__grid { grid-template-columns: 1fr; }
}
</style>
