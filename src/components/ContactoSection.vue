<script setup>
import { ref, reactive } from 'vue'
import { Motion } from 'motion-v'

const form = reactive({
  nombre: '',
  telefono: '',
  email: '',
  servicio: '',
  zona: '',
  mensaje: '',
  honey: '',
})

const status = ref('idle') // idle | loading | success | error
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
  { icon: 'forum', label: 'WhatsApp', value: '+54 9 11 6502-9146', href: 'https://wa.me/5491165029146' },
  { icon: 'mail_outline', label: 'Email', value: 'info@ecoproteccion.com.ar', href: 'mailto:info@ecoproteccion.com.ar' },
  { icon: 'photo_camera', label: 'Instagram', value: '@ecoproteccion', href: 'https://www.instagram.com/ecoproteccion/' },
  { icon: 'thumb_up', label: 'Facebook', value: '/ecoproteccion', href: 'https://www.facebook.com/ecoproteccion' },
]
</script>

<template>
  <section id="contacto" class="ctc">
    <div class="container ctc__head">
      <Motion
        as="div"
        class="act-mark"
        :initial="{ opacity: 0, x: -40 }"
        :while-in-view="{ opacity: 1, x: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.7 }"
      >
        <span class="act-mark__num display">05</span>
        <span class="act-mark__label mono">CIERRE</span>
      </Motion>

      <div class="ctc__heading">
        <Motion
          as="span"
          class="eyebrow"
          :initial="{ opacity: 0 }"
          :while-in-view="{ opacity: 1 }"
          :in-view-options="{ once: true }"
          :transition="{ duration: 0.6, delay: 0.1 }"
        >Hablemos</Motion>

        <Motion
          as="h2"
          class="ctc__title display"
          :initial="{ opacity: 0, y: 30 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -120px 0px' }"
          :transition="{ duration: 0.8, delay: 0.15 }"
        >
          Contános qué pasa.<br/>
          <em>Te respondemos hoy.</em>
        </Motion>

        <Motion
          as="p"
          class="body-lg ctc__lede"
          :initial="{ opacity: 0, y: 20 }"
          :while-in-view="{ opacity: 1, y: 0 }"
          :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
          :transition="{ duration: 0.7, delay: 0.3 }"
        >
          Pedinos un diagnóstico sin compromiso. Visitamos, evaluamos y proponemos el plan
          más eficaz al menor impacto. AMBA y zonas aledañas.
        </Motion>
      </div>
    </div>

    <div class="container ctc__body">
      <!-- Form -->
      <Motion
        class="form-card"
        :initial="{ opacity: 0, y: 40 }"
        :while-in-view="{ opacity: 1, y: 0 }"
        :in-view-options="{ once: true, margin: '0px 0px -100px 0px' }"
        :transition="{ duration: 0.8 }"
      >
        <div class="form-card__head">
          <span class="mono">FORM · 001</span>
          <span class="mono">SOLICITUD DE PRESUPUESTO</span>
        </div>

        <form @submit.prevent="submit" novalidate>
          <div class="field-row">
            <label class="field">
              <span class="field__label mono">→ Nombre *</span>
              <input v-model="form.nombre" type="text" placeholder="Ej. Marcelo Gallardo" required>
            </label>
            <label class="field">
              <span class="field__label mono">→ Teléfono *</span>
              <input v-model="form.telefono" type="tel" placeholder="11 6502-9146" required>
            </label>
          </div>

          <label class="field">
            <span class="field__label mono">→ Email</span>
            <input v-model="form.email" type="email" placeholder="vos@email.com">
          </label>

          <div class="field-row">
            <label class="field">
              <span class="field__label mono">→ Servicio *</span>
              <div class="select-wrap">
                <select v-model="form.servicio" required>
                  <option disabled value="">Elegí uno</option>
                  <option v-for="s in services" :key="s" :value="s">{{ s }}</option>
                </select>
                <span class="mi select-wrap__chev">expand_more</span>
              </div>
            </label>
            <label class="field">
              <span class="field__label mono">→ Zona / Barrio</span>
              <input v-model="form.zona" type="text" placeholder="CABA, Vicente López...">
            </label>
          </div>

          <label class="field">
            <span class="field__label mono">→ Contános</span>
            <textarea v-model="form.mensaje" rows="4" placeholder="Tipo de propiedad, m², qué problema notás..."></textarea>
          </label>

          <!-- honeypot -->
          <input v-model="form.honey" type="text" tabindex="-1" autocomplete="off" class="honey" aria-hidden="true">

          <div class="form-card__footer">
            <button class="btn btn--primary" :disabled="status === 'loading'" type="submit">
              <template v-if="status === 'loading'">
                Enviando<span class="mi mi--spin">progress_activity</span>
              </template>
              <template v-else-if="status === 'success'">
                Mensaje enviado ✓
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
            :initial="{ opacity: 0, y: 8 }"
            :animate="{ opacity: 1, y: 0 }"
          >
            <span class="mi">error_outline</span>
            {{ errorMsg }}
          </Motion>
          <Motion
            v-if="status === 'success'"
            class="form-msg form-msg--ok"
            :initial="{ opacity: 0, y: 8 }"
            :animate="{ opacity: 1, y: 0 }"
          >
            <span class="mi">check_circle</span>
            Recibimos tu pedido. Te contactamos en menos de 24 hs.
          </Motion>
        </form>
      </Motion>

      <!-- Contact panel -->
      <Motion
        class="ctc__panel"
        :initial="{ opacity: 0, y: 40 }"
        :while-in-view="{ opacity: 1, y: 0 }"
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
            <span class="mono">REG.</span>
            <span class="display">730 / 988</span>
          </div>
          <div class="card-foot__bit">
            <span class="mono">ZONA</span>
            <span class="display">AMBA</span>
          </div>
          <div class="card-foot__bit">
            <span class="mono">HORARIO</span>
            <span class="display">L–S</span>
          </div>
        </div>
      </Motion>
    </div>
  </section>
</template>

<style scoped>
.ctc {
  padding: 7rem 0 6rem;
  background:
    radial-gradient(ellipse 600px 400px at 20% 0%, rgba(126, 211, 33, 0.08), transparent 60%),
    var(--eco-ink);
  position: relative;
}

.ctc__head {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 3rem;
  align-items: start;
  margin-bottom: 4rem;
}
.act-mark { border-left: 2px solid var(--eco-lime); padding-left: 1.25rem; }
.act-mark__num { font-size: clamp(4rem, 8vw, 7rem); color: var(--eco-lime); line-height: 0.8; display: block; }
.act-mark__label { display: block; font-size: 0.6875rem; letter-spacing: 0.2em; text-transform: uppercase; color: rgba(244, 241, 232, 0.55); margin-top: 0.4rem; }

.ctc__heading { padding-top: 0.75rem; }
.ctc__title {
  font-size: clamp(2.25rem, 5.5vw, 4.75rem);
  margin: 1rem 0 1.5rem;
  color: var(--eco-bone);
}
.ctc__title em { font-style: italic; color: var(--eco-lime); font-weight: 800; }
.ctc__lede { max-width: 56ch; }

.ctc__body {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: 1.25rem;
}

/* Form card */
.form-card {
  background: var(--eco-deep);
  border: 1px solid rgba(244, 241, 232, 0.1);
  padding: clamp(1.5rem, 3vw, 2.5rem);
  position: relative;
}
.form-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 4px;
  background: var(--eco-lime);
}
.form-card__head {
  display: flex;
  justify-content: space-between;
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  color: var(--eco-lime);
  margin-bottom: 2rem;
  padding-bottom: 0.75rem;
  border-bottom: 1px dashed rgba(244, 241, 232, 0.12);
}

.field-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}
.field {
  display: block;
  margin-bottom: 1.25rem;
}
.field__label {
  display: block;
  font-size: 0.6875rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--eco-lime);
  margin-bottom: 0.5rem;
}
.field input,
.field select,
.field textarea {
  width: 100%;
  background: var(--eco-ink);
  border: 1px solid rgba(244, 241, 232, 0.12);
  color: var(--eco-bone);
  font-family: var(--font-body);
  font-size: 1rem;
  padding: 0.85rem 1rem;
  transition: border-color 0.25s, background 0.25s;
  appearance: none;
  border-radius: 0;
}
.field textarea {
  resize: vertical;
  min-height: 100px;
  font-family: var(--font-body);
}
.field input:focus,
.field select:focus,
.field textarea:focus {
  outline: none;
  border-color: var(--eco-lime);
  background: rgba(126, 211, 33, 0.04);
}
.field input::placeholder,
.field textarea::placeholder {
  color: rgba(244, 241, 232, 0.3);
}

.select-wrap { position: relative; }
.select-wrap select { padding-right: 2.5rem; }
.select-wrap__chev {
  position: absolute;
  right: 0.85rem;
  top: 50%;
  transform: translateY(-50%);
  pointer-events: none;
  color: var(--eco-lime);
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
  margin-top: 1.5rem;
}
.btn {
  display: inline-flex;
  align-items: center;
  gap: 0.625rem;
  padding: 0.95rem 1.4rem;
  font-family: var(--font-mono);
  font-size: 0.8125rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  border: 1px solid;
  transition: all 0.25s;
  cursor: pointer;
}
.btn:disabled { opacity: 0.7; cursor: progress; }
.btn--primary {
  background: var(--eco-lime);
  color: var(--eco-ink);
  border-color: var(--eco-lime);
}
.btn--primary:hover { background: var(--eco-lime-glow); border-color: var(--eco-lime-glow); }
.btn--ghost {
  background: transparent;
  color: var(--eco-bone);
  border-color: rgba(244, 241, 232, 0.25);
}
.btn--ghost:hover { border-color: var(--eco-lime); color: var(--eco-lime); }
.mi--spin {
  animation: spin 1s linear infinite;
  margin-left: 0.3rem;
}
@keyframes spin { to { transform: rotate(360deg); } }

.form-msg {
  margin-top: 1rem;
  padding: 0.75rem 1rem;
  font-family: var(--font-mono);
  font-size: 0.8125rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}
.form-msg--ok {
  background: rgba(126, 211, 33, 0.12);
  border: 1px solid var(--eco-lime);
  color: var(--eco-lime);
}
.form-msg--err {
  background: rgba(194, 73, 42, 0.12);
  border: 1px solid var(--eco-rust);
  color: var(--eco-rust);
}

/* Panel */
.ctc__panel {
  background: linear-gradient(180deg, rgba(126, 211, 33, 0.06), transparent 50%), var(--eco-deep);
  border: 1px solid rgba(126, 211, 33, 0.2);
  padding: clamp(1.5rem, 3vw, 2.25rem);
  display: flex;
  flex-direction: column;
}
.panel-head { margin-bottom: 2rem; }
.panel-head__title {
  font-size: clamp(1.5rem, 2.6vw, 2rem);
  color: var(--eco-bone);
  margin-top: 0.75rem;
  max-width: 14ch;
}

.channels { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; flex: 1; }
.channel {
  display: grid;
  grid-template-columns: auto 1fr auto;
  gap: 1rem;
  align-items: center;
  padding: 1rem 1.1rem;
  border: 1px solid rgba(244, 241, 232, 0.08);
  background: var(--eco-ink);
  transition: all 0.25s;
}
.channel:hover {
  border-color: var(--eco-lime);
  background: rgba(126, 211, 33, 0.05);
}
.channel__icon {
  width: 38px;
  height: 38px;
  background: rgba(126, 211, 33, 0.12);
  color: var(--eco-lime);
  font-size: 1.25rem;
}
.channel__txt { display: flex; flex-direction: column; gap: 0.15rem; min-width: 0; }
.channel__label {
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(244, 241, 232, 0.5);
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
  color: var(--eco-lime);
  opacity: 0.5;
  transition: opacity 0.25s, transform 0.25s;
}
.channel:hover .channel__arrow {
  opacity: 1;
  transform: translate(2px, -2px);
}

.card-foot {
  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 1px dashed rgba(244, 241, 232, 0.1);
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0.75rem;
}
.card-foot__bit { display: flex; flex-direction: column; gap: 0.2rem; }
.card-foot__bit .mono {
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  color: rgba(244, 241, 232, 0.5);
}
.card-foot__bit .display {
  font-size: clamp(1.25rem, 2vw, 1.625rem);
  color: var(--eco-lime);
  line-height: 1;
  letter-spacing: -0.01em;
}

@media (max-width: 980px) {
  .ctc__head { grid-template-columns: 1fr; gap: 1.5rem; }
  .ctc__body { grid-template-columns: 1fr; }
  .field-row { grid-template-columns: 1fr; gap: 0; }
}
</style>
