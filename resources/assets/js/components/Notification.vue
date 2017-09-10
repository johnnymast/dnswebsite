<template>
    <div class="alert" :class="['notification', 'alert-' + level]" role="alert">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            level: {
                default: 'primary'
            }
        },
        data() {
            return {
                show: true
            }
        }
    }
</script>
