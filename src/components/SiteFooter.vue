<script setup>
const year = new Date().getFullYear()
</script>

<template>
  <footer class="ft">
    <!--div class="container ft__big">
      <h2 class="ft__bigtext display">
        Eco<em>protección</em>
      </h2>
      <p class="ft__tag">
        Protección integral, del tanque al jardín.
      </p>
    </div-->

    <div class="container ft__grid">
      <div class="ft__col">
        <img src="/assets/logo.png" alt="Ecoprotección" class="ft__logo"/>
        <p class="ft__txt">
          Control de plagas, limpieza y desinfección de tanques de agua potable.
          Productos aprobados SENASA / ANMAT.
        </p>
      </div>

      <div class="ft__col">
        <span class="ft__h mono">Secciones</span>
        <ul>
          <li><a href="#tanques">Limpieza de tanques</a></li>
          <li><a href="#desinfeccion">Desinfección</a></li>
          <li><a href="#mip">MIP</a></li>
          <li><a href="#nosotros">Nosotros</a></li>
          <li><a href="#contacto">Contacto</a></li>
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
      <span>© {{ year }} All rights reserved · <a href="https://mmlab.ar" target="_blank" rel="noopener">MYMLAB</a></span>
    </div>
  </footer>
</template>

<style scoped>
.ft {
  background: var(--eco-bone);
  color: var(--eco-ink);
  border-top: 1px solid var(--eco-line);
  padding-bottom: 2rem;
}
.ft__big {
  padding: 5rem 0 2.5rem;
  text-align: center;
}
.ft__bigtext {
  font-size: clamp(3.5rem, 14vw, 11rem);
  color: var(--eco-ink);
  letter-spacing: -0.035em;
  line-height: 0.9;
  font-weight: 600;
}
.ft__bigtext em {
  font-style: italic;
  color: var(--eco-forest);
  font-weight: 500;
}
.ft__tag {
  font-family: var(--font-display);
  font-style: italic;
  font-size: clamp(1rem, 1.5vw, 1.2rem);
  color: var(--eco-muted);
  margin-top: 0.5rem;
}

.ft__grid {
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr 1fr;
  gap: 2rem;
  padding-top: 3rem;
  border-top: 1px solid var(--eco-line);
  margin-bottom: 2.5rem;
}

.ft__col { display: flex; flex-direction: column; gap: 0.65rem; }
.ft__logo { height: auto; width: 100%; margin-bottom: 0.4rem; }
.ft__txt {
  font-size: 0.875rem;
  color: var(--eco-graphite);
  line-height: 1.55;
  max-width: 38ch;
}
.ft__h {
  font-size: 0.6875rem;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--eco-forest);
  margin-bottom: 0.6rem;
}
.ft__col ul { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; }
.ft__col li { font-size: 0.875rem; color: var(--eco-graphite); }
.ft__col li a { transition: color 0.25s; }
.ft__col li a:hover { color: var(--eco-forest); }

.ft__bottom {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  flex-wrap: wrap;
  padding-top: 1.5rem;
  border-top: 1px dashed var(--eco-line);
  font-size: 0.6875rem;
  letter-spacing: 0.16em;
  color: var(--eco-muted);
  text-transform: uppercase;
}

@media (max-width: 880px) {
  .ft__grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 560px) {
  .ft__grid { grid-template-columns: 1fr; }
}
</style>
