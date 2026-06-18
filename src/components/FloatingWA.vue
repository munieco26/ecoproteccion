<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Motion } from 'motion-v'

const visible = ref(false)
function onScroll() { visible.value = window.scrollY > 500 }
onMounted(() => {
  window.addEventListener('scroll', onScroll, { passive: true })
  onScroll()
})
onUnmounted(() => window.removeEventListener('scroll', onScroll))
</script>

<template>
  <Motion
    as="a"
    href="https://wa.me/5491165029146?text=Hola%20Ecoprotecci%C3%B3n%2C%20quiero%20pedir%20un%20presupuesto."
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
  padding: 0.85rem 1.15rem;
  background: var(--eco-forest);
  color: var(--eco-bone);
  font-family: var(--font-body);
  font-weight: 600;
  border-radius: 999px;
  box-shadow: 0 12px 32px -8px rgba(20, 81, 42, 0.55), 0 2px 8px rgba(11, 20, 16, 0.18);
  transition: transform 0.25s, box-shadow 0.25s, background 0.25s;
  overflow: visible;
}
.fab:hover {
  background: var(--eco-forest-deep);
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 16px 38px -8px rgba(20, 81, 42, 0.55), 0 4px 12px rgba(11, 20, 16, 0.22);
}
.fab .mi { font-size: 1.4rem; }
.fab__txt { display: flex; flex-direction: column; line-height: 1.1; }
.fab__txt .mono {
  font-size: 0.625rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(247, 244, 236, 0.75);
}
.fab__num {
  font-family: var(--font-mono);
  font-size: 0.875rem;
  font-weight: 600;
}
.fab__pulse {
  position: absolute;
  inset: 0;
  border-radius: inherit;
  pointer-events: none;
  animation: pulse 2.4s ease-out infinite;
  box-shadow: 0 0 0 0 rgba(30, 122, 51, 0.6);
}
@keyframes pulse {
  0%   { box-shadow: 0 0 0 0 rgba(30, 122, 51, 0.55); }
  70%  { box-shadow: 0 0 0 18px rgba(30, 122, 51, 0); }
  100% { box-shadow: 0 0 0 0 rgba(30, 122, 51, 0); }
}

@media (max-width: 560px) {
  .fab__txt { display: none; }
  .fab { padding: 1rem; border-radius: 100%; }
}
</style>
