<template>
    <div class="contacts-list"></div>
    <ul>
        <li v-for="contact in contacts" :key="contact.user_id">
            <div class="avatar">
                <image :alt="contact.nama"></image>
            </div>
            <div class="contact">
                <p class="nama">{{contact.nama}}</p>
                <p class="username">{{contact.username}}</p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        }
    }
</script>
