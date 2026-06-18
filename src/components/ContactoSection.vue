<script setup>
import { ref, reactive } from 'vue'
import { Motion } from 'motion-v'
import HexMotif from './HexMotif.vue'

const form = reactive({
  nombre: '',
  telefono: '',
  email: '',
  servicio: '',
  zona: '',
  mensaje: '',
  honey: '',
})

const status = ref('idle')
const errorMsg = ref('')

const services = [
  'Limpieza de tanque',
  'Desinfección general',
  'Desinsectación / Antiviral',
  'Desratización',
  'MIP — programa integrado',
  'Otro / Consulta',
]

async function submit() {
  if (form.honey) return
  if (!form.nombre || !form.telefono || !form.servicio) {
    errorMsg.value = 'Completá nombre, teléfono y servicio.'
    status.value = 'error'
    return
  }
  status.value = 'loading'
  errorMsg.value = ''
  try {
    const res = await fetch('/api/contact.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(form),
    })
    if (!res.ok) throw new Error('respuesta inválida')
    status.value = 'success'
    setTimeout(() => {
      Object.assign(form, { nombre: '', telefono: '', email: '', servicio: '', zona: '', mensaje: '' })
    }, 800)
  } catch (e) {
    errorMsg.value = 'No se pudo enviar. Probá por WhatsApp.'
    status.value = 'error'
  }
}

const channels = [
  { icon: 'forum',         label: 'WhatsApp',   value: '+54 9 11 6502-9146',           href: 'https://wa.me/5491165029146' },
  { icon: 'mail_outline',  label: 'Email',      value: 'info@ecoproteccion.com.ar',    href: 'mailto:info@ecoproteccion.com.ar' },
  { icon: 'photo_camera',  label: 'Instagram',  value: '@ecoproteccion',               href: 'https://www.instagram.com/ecoproteccion/' },
  { icon: 'thumb_up',      label: 'Facebook',   value: '/ecoproteccion',               href: 'https://www.facebook.com/ecoproteccion' },
]
</script>

<template>
  <section id="contacto" class="ctc">
    <HexMotif position="bl" variant="solid" :size="220" :opacity="0.95" />

    <div class="container">
      <div class="section-head">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ y: 6 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6 }"
        >Hablemos</Motion>

        <Motion
          as="h2"
          class="section-head__title display"
          :initial="{ y: 24 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.1 }"
        >
          Contános qué pasa.<br/>
          <em>Te respondemos hoy.</em>
        </Motion>

        <Motion
          as="p"
          class="body-lg section-head__lede"
          :initial="{ y: 16 }"
          :while-in-view="{ y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.2 }"
        >
          Pedinos un diagnóstico sin compromiso. Visitamos, evaluamos y
          proponemos el plan más eficaz al menor impacto. AMBA y zonas aledañas.
        </Motion>
      </div>
    </div>

    <div class="container ctc__body">
      <!-- Form -->
      <Motion
        class="form-card"
        :initial="{ y: 32 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="form-card__head">
          <span class="mono">Form · 001</span>
          <span class="mono">Solicitud de presupuesto</span>
        </div>

        <form @submit.prevent="submit" novalidate>
          <div class="field-row">
            <label class="field">
              <span class="field__label">Nombre *</span>
              <input v-model="form.nombre" type="text" placeholder="Ej. María García" required>
            </label>
            <label class="field">
              <span class="field__label">Teléfono *</span>
              <input v-model="form.telefono" type="tel" placeholder="11 6502-9146" required>
            </label>
          </div>

          <label class="field">
            <span class="field__label">Email</span>
            <input v-model="form.email" type="email" placeholder="vos@email.com">
          </label>

          <div class="field-row">
            <label class="field">
              <span class="field__label">Servicio *</span>
              <div class="select-wrap">
                <select v-model="form.servicio" required>
                  <option disabled value="">Elegí uno</option>
                  <option v-for="s in services" :key="s" :value="s">{{ s }}</option>
                </select>
                <span class="mi select-wrap__chev">expand_more</span>
              </div>
            </label>
            <label class="field">
              <span class="field__label">Zona / Barrio</span>
              <input v-model="form.zona" type="text" placeholder="CABA, Vicente López...">
            </label>
          </div>

          <label class="field">
            <span class="field__label">Contános</span>
            <textarea v-model="form.mensaje" rows="4" placeholder="Tipo de propiedad, m², qué problema notás..."></textarea>
          </label>

          <input v-model="form.honey" type="text" tabindex="-1" autocomplete="off" class="honey" aria-hidden="true">

          <div class="form-card__footer">
            <button class="btn btn--primary" :disabled="status === 'loading'" type="submit">
              <template v-if="status === 'loading'">
                Enviando<span class="mi mi--spin">progress_activity</span>
              </template>
              <template v-else-if="status === 'success'">
                Mensaje enviado <span class="mi">check</span>
              </template>
              <template v-else>
                Solicitar presupuesto
                <span class="mi">arrow_outward</span>
              </template>
            </button>

            <a href="https://wa.me/5491165029146" target="_blank" rel="noopener" class="btn btn--ghost">
              <span class="mi mi-out">forum</span>
              o por WhatsApp
            </a>
          </div>

          <Motion
            v-if="status === 'error'"
            class="form-msg form-msg--err"
            :initial="{ y: 8 }"
            :animate="{ y: 0 }"
          >
            <span class="mi">error_outline</span>
            {{ errorMsg }}
          </Motion>
          <Motion
            v-if="status === 'success'"
            class="form-msg form-msg--ok"
            :initial="{ y: 8 }"
            :animate="{ y: 0 }"
          >
            <span class="mi">check_circle</span>
            Recibimos tu pedido. Te contactamos en menos de 24 hs.
          </Motion>
        </form>
      </Motion>

      <!-- Contact panel -->
      <Motion
        class="ctc__panel"
        :initial="{ y: 32 }"
        :while-in-view="{ y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8, delay: 0.1 }"
      >
        <div class="panel-head">
          <span class="eyebrow">Canales abiertos</span>
          <h3 class="panel-head__title display">Encontranos en cualquier canal.</h3>
        </div>

        <ul class="channels">
          <li v-for="c in channels" :key="c.label">
            <a :href="c.href" target="_blank" rel="noopener" class="channel">
              <span class="channel__icon mi mi-out">{{ c.icon }}</span>
              <span class="channel__txt">
                <span class="channel__label mono">{{ c.label }}</span>
                <span class="channel__val">{{ c.value }}</span>
              </span>
              <span class="channel__arrow mi">arrow_outward</span>
            </a>
          </li>
        </ul>

        <div class="card-foot">
          <div class="card-foot__bit">
            <span class="mono">Reg.</span>
            <span class="display">730 · 988</span>
          </div>
          <div class="card-foot__bit">
            <span class="mono">Zona</span>
            <span class="display">AMBA</span>
          </div>
          <div class="card-foot__bit">
            <span class="mono">Horario</span>
            <span class="display">L–S</span>
          </div>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.ctc {
  padding: clamp(5rem, 9vw, 7.5rem) 0 6rem;
  background: var(--eco-bone);
  position: relative;
  overflow: hidden;
}

.ctc__body {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: 1.25rem;
}

/* Form card */
.form-card {
  background: var(--eco-white);
  border: 1px solid var(--eco-line);
  border-radius: var(--r-lg);
  padding: clamp(1.75rem, 3vw, 2.75rem);
  box-shadow: var(--shadow-card);
  position: relative;
  overflow: hidden;
}
.form-card::before {
  content: '';
  position: absolute;
  left: 0; top: 0;
  width: 6px;
  height: 100%;
  background: var(--eco-forest);
}
.form-card__head {
  display: flex;
  justify-content: space-between;
  font-size: 0.6875rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--eco-muted);
  margin-bottom: 1.75rem;
  padding-bottom: 0.85rem;
  border-bottom: 1px dashed var(--eco-line);
}

.field-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}
.field {
  display: block;
  margin-bottom: 1.1rem;
}
.field__label {
  display: block;
  font-size: 0.75rem;
  letter-spacing: 0.04em;
  font-weight: 600;
  color: var(--eco-ink);
  margin-bottom: 0.45rem;
}
.field input,
.field select,
.field textarea {
  width: 100%;
  background: var(--eco-bone);
  border: 1px solid var(--eco-line);
  color: var(--eco-ink);
  font-family: var(--font-body);
  font-size: 1rem;
  padding: 0.85rem 1rem;
  border-radius: 12px;
  transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
  appearance: none;
}
.field textarea { resize: vertical; min-height: 110px; }
.field input:focus,
.field select:focus,
.field textarea:focus {
  outline: none;
  background: var(--eco-white);
  border-color: var(--eco-forest);
  box-shadow: 0 0 0 4px rgba(30, 122, 51, 0.12);
}
.field input::placeholder,
.field textarea::placeholder { color: var(--eco-muted); }

.select-wrap { position: relative; }
.select-wrap select { padding-right: 2.5rem; cursor: pointer; }
.select-wrap__chev {
  position: absolute;
  right: 0.85rem;
  top: 50%;
  transform: translateY(-50%);
  pointer-events: none;
  color: var(--eco-forest);
}

.honey {
  position: absolute !important;
  left: -9999px;
  width: 1px;
  height: 1px;
  opacity: 0;
}

.form-card__footer {
  display: flex;
  gap: 0.75rem;
  flex-wrap: wrap;
  margin-top: 1.25rem;
}
.mi--spin { animation: spin 1s linear infinite; }
@keyframes spin { to { transform: rotate(360deg); } }

.form-msg {
  margin-top: 1rem;
  padding: 0.8rem 1rem;
  font-size: 0.875rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  border-radius: 12px;
}
.form-msg--ok {
  background: rgba(30, 122, 51, 0.1);
  color: var(--eco-forest-deep);
}
.form-msg--err {
  background: rgba(193, 73, 42, 0.1);
  color: #B14924;
}

/* Panel */
.ctc__panel {
  background: var(--eco-ink);
  color: var(--eco-bone);
  border-radius: var(--r-lg);
  padding: clamp(1.75rem, 3vw, 2.5rem);
  display: flex;
  flex-direction: column;
  position: relative;
  overflow: hidden;
}
.ctc__panel::after {
  content: '';
  position: absolute;
  width: 240px;
  height: 240px;
  background: radial-gradient(circle, rgba(30, 122, 51, 0.35), transparent 65%);
  top: -40px;
  right: -60px;
  pointer-events: none;
}

.panel-head { margin-bottom: 1.75rem; position: relative; z-index: 1; }
.panel-head .eyebrow { color: var(--eco-leaf); }
.panel-head .eyebrow::before { background: var(--eco-leaf); }
.panel-head__title {
  font-size: clamp(1.45rem, 2.5vw, 1.85rem);
  color: var(--eco-bone);
  margin-top: 0.75rem;
  max-width: 16ch;
}

.channels {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  flex: 1;
  position: relative;
  z-index: 1;
}
.channel {
  display: grid;
  grid-template-columns: auto 1fr auto;
  gap: 1rem;
  align-items: center;
  padding: 0.9rem 1rem;
  border: 1px solid rgba(247, 244, 236, 0.12);
  background: rgba(247, 244, 236, 0.04);
  border-radius: 14px;
  transition: all 0.25s;
}
.channel:hover {
  border-color: var(--eco-leaf);
  background: rgba(30, 122, 51, 0.15);
  transform: translateX(2px);
}
.channel__icon {
  width: 38px;
  height: 38px;
  background: rgba(30, 122, 51, 0.25);
  color: var(--eco-leaf);
  font-size: 1.25rem;
  border-radius: 10px;
}
.channel__txt { display: flex; flex-direction: column; gap: 0.1rem; min-width: 0; }
.channel__label {
  font-size: 0.625rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(247, 244, 236, 0.55);
}
.channel__val {
  font-size: 0.9375rem;
  color: var(--eco-bone);
  font-weight: 500;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.channel__arrow {
  color: var(--eco-leaf);
  opacity: 0.6;
  transition: opacity 0.25s, transform 0.25s;
  font-size: 1rem;
}
.channel:hover .channel__arrow {
  opacity: 1;
  transform: translate(2px, -2px);
}

.card-foot {
  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 1px dashed rgba(247, 244, 236, 0.18);
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0.75rem;
  position: relative;
  z-index: 1;
}
.card-foot__bit { display: flex; flex-direction: column; gap: 0.25rem; }
.card-foot__bit .mono {
  font-size: 0.625rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(247, 244, 236, 0.5);
}
.card-foot__bit .display {
  font-size: clamp(1.15rem, 1.8vw, 1.5rem);
  color: var(--eco-leaf);
  line-height: 1;
  font-weight: 600;
  letter-spacing: -0.01em;
}

@media (max-width: 980px) {
  .ctc__body { grid-template-columns: 1fr; }
  .field-row { grid-template-columns: 1fr; gap: 0; }
}
</style>
