<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Motion } from 'motion-v'

const visible = ref(false)
function onScroll() {
  visible.value = window.scrollY > 500
}
onMounted(() => {
  window.addEventListener('scroll', onScroll, { passive: true })
  onScroll()
})
onUnmounted(() => window.removeEventListener('scroll', onScroll))
</script>

<template>
  <Motion
    as="a"
    href="https://wa.me/5491165029146?text=Hola%20Ecoproteccion%2C%20quiero%20pedir%20un%20presupuesto."
    target="_blank"
    rel="noopener"
    class="fab"
    :animate="{ opacity: visible ? 1 : 0, y: visible ? 0 : 30, pointerEvents: visible ? 'auto' : 'none' }"
    :initial="{ opacity: 0, y: 30 }"
    :transition="{ duration: 0.4 }"
    aria-label="WhatsApp"
  >
    <span class="mi">forum</span>
    <span class="fab__txt">
      <span class="mono">Chateamos</span>
      <span class="fab__num">11 6502-9146</span>
    </span>
    <span class="fab__pulse"></span>
  </Motion>
</template>

<style scoped>
.fab {
  position: fixed;
  right: 1.25rem;
  bottom: 1.25rem;
  z-index: 100;
  display: inline-flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.85rem 1.1rem;
  background: var(--eco-lime);
  color: var(--eco-ink);
  font-family: var(--font-body);
  font-weight: 600;
  box-shadow: 0 12px 32px rgba(126, 211, 33, 0.3), 0 2px 8px rgba(0, 0, 0, 0.5);
  border: 1px solid var(--eco-lime-glow);
  transition: transform 0.25s, box-shadow 0.25s;
  overflow: visible;
}
.fab:hover {
  transform: translateY(-4px) scale(1.03);
  box-shadow: 0 16px 40px rgba(126, 211, 33, 0.45), 0 4px 12px rgba(0, 0, 0, 0.5);
}
.fab .mi { font-size: 1.5rem; }
.fab__txt { display: flex; flex-direction: column; line-height: 1.1; }
.fab__txt .mono {
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  opacity: 0.75;
}
.fab__num {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 700;
}
.fab__pulse {
  position: absolute;
  inset: -1px;
  border-radius: inherit;
  pointer-events: none;
  animation: pulse 2.4s ease-out infinite;
  box-shadow: 0 0 0 0 rgba(126, 211, 33, 0.7);
}
@keyframes pulse {
  0% { box-shadow: 0 0 0 0 rgba(126, 211, 33, 0.6); }
  70% { box-shadow: 0 0 0 18px rgba(126, 211, 33, 0); }
  100% { box-shadow: 0 0 0 0 rgba(126, 211, 33, 0); }
}

@media (max-width: 560px) {
  .fab__txt { display: none; }
  .fab { padding: 1rem; border-radius: 100%; }
}
</style>
