
<script setup>
const props = defineProps({
  position: { type: String, default: 'tl' },
  variant:  { type: String, default: 'solid' },
  size:     { type: [Number, String], default: 260 },
  tree:     { type: Boolean, default: true },
  opacity:  { type: [Number, String], default: 1 },
})
</script>

<template>
  <svg
    class="hex-motif"
    :class="[`hex-motif--${position}`, `hex-motif--${variant}`]"
    :width="size"
    :height="size"
    viewBox="0 0 220 320"
    fill="none"
    aria-hidden="true"
    :style="{ opacity }"
  >
    <defs>
      <clipPath :id="`hex-clip-${position}-${variant}`">
        <path d="
          M70 4
          L150 4
          Q172 4 184 22
          L208 64
          Q220 84 208 104
          L188 138
          Q176 158 188 178
          L208 212
          Q220 232 208 252
          L186 290
          Q174 308 152 308
          L72 308
          Q50 308 38 290
          L16 252
          Q4 232 16 212
          L36 178
          Q48 158 36 138
          L16 104
          Q4 84 16 64
          L40 22
          Q52 4 70 4 Z
        "/>
      </clipPath>
    </defs>

    <g v-if="variant === 'solid'">
      <path
        d="M74 6 L146 6 Q166 6 176 22 L200 64 Q210 82 200 100 L182 130 Q170 152 182 174 L202 208 Q212 226 202 244 L182 282 Q170 300 150 300 L74 300 Q54 300 42 282 L22 244 Q12 226 22 208 L42 174 Q54 152 42 130 L24 100 Q14 82 24 64 L48 22 Q58 6 74 6 Z"
        fill="#FFFFFF"
        stroke="#0B1410"
        stroke-width="3"
      />
      <path
        d="M70 4 L150 4 Q172 4 184 22 L208 64 Q220 84 208 104 L188 138 Q176 158 188 178 L208 212 Q220 232 208 252 L186 290 Q174 308 152 308 L72 308 Q50 308 38 290 L16 252 Q4 232 16 212 L36 178 Q48 158 36 138 L16 104 Q4 84 16 64 L40 22 Q52 4 70 4 Z"
        fill="#1E7A33"
      />
      <g :clip-path="`url(#hex-clip-${position}-${variant})`">
        <path
          d="M-20 110 Q60 90 110 150 Q160 210 80 220 Q-10 230 -20 180 Z"
          fill="#0B1410"
        />
      </g>

      <g v-if="tree" transform="translate(74, 148)" stroke="#1E7A33" stroke-width="1.3" fill="#1E7A33">
        <circle cx="0" cy="0" r="18" fill="none" stroke-width="1.4"/>
        <path
          d="
            M0 -9
            C -4 -10, -7 -7, -7 -3
            C -10 -3, -12 1, -10 4
            C -13 5, -13 9, -10 10
            L 10 10
            C 13 9, 13 5, 10 4
            C 12 1, 10 -3, 7 -3
            C 7 -7, 4 -10, 0 -9 Z
          "
          fill="#1E7A33"
        />
        <rect x="-1.2" y="9" width="2.4" height="4" fill="#1E7A33"/>
      </g>
    </g>

    <g v-else-if="variant === 'outline'">
      <path
        d="M70 4 L150 4 Q172 4 184 22 L208 64 Q220 84 208 104 L188 138 Q176 158 188 178 L208 212 Q220 232 208 252 L186 290 Q174 308 152 308 L72 308 Q50 308 38 290 L16 252 Q4 232 16 212 L36 178 Q48 158 36 138 L16 104 Q4 84 16 64 L40 22 Q52 4 70 4 Z"
        fill="none"
        stroke="#0B1410"
        stroke-width="2"
        stroke-opacity="0.65"
      />
    </g>

    <g v-else-if="variant === 'thin'">
      <path
        d="M70 4 L150 4 Q172 4 184 22 L208 64 Q220 84 208 104 L188 138 Q176 158 188 178 L208 212 Q220 232 208 252 L186 290 Q174 308 152 308 L72 308 Q50 308 38 290 L16 252 Q4 232 16 212 L36 178 Q48 158 36 138 L16 104 Q4 84 16 64 L40 22 Q52 4 70 4 Z"
        fill="none"
        stroke="#1E7A33"
        stroke-width="1.5"
      />
    </g>

    <g v-else-if="variant === 'chevron'">
      <path
        d="M65 80 L110 130 L155 80"
        fill="none"
        stroke="#1E7A33"
        stroke-width="3"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </g>
  </svg>
</template>

<style scoped>
.hex-motif {
  position: absolute;
  pointer-events: none;
  z-index: 0;
  filter: drop-shadow(0 14px 30px rgba(11, 20, 16, 0.10));
}
.hex-motif--solid  {}
.hex-motif--outline { filter: none; }
.hex-motif--thin    { filter: none; }
.hex-motif--chevron { filter: none; }

.hex-motif--tl { top: -40px; left: -48px; transform: rotate(-6deg); }
.hex-motif--tr { top: -44px; right: -44px; transform: rotate(8deg); }
.hex-motif--bl { bottom: -40px; left: -44px; transform: rotate(10deg); }
.hex-motif--br { bottom: -50px; right: -52px; transform: rotate(-7deg); }

.hex-motif--tm { top: -90px; left: 50%; transform: translateX(-50%) rotate(2deg); }
.hex-motif--bm { bottom: -90px; left: 50%; transform: translateX(-50%) rotate(-3deg); }

.hex-motif--center { top: 50%; left: 50%; transform: translate(-50%, -50%); }

@media (max-width: 880px) {
  .hex-motif { transform-origin: center; }
  .hex-motif--tl { width: 150px !important; height: 218px !important; top: -28px; left: -36px; }
  .hex-motif--tr { width: 130px !important; height: 188px !important; top: -28px; right: -32px; }
  .hex-motif--bl { width: 130px !important; height: 188px !important; bottom: -28px; left: -32px; }
  .hex-motif--br { width: 130px !important; height: 188px !important; bottom: -32px; right: -34px; }
}
</style>
