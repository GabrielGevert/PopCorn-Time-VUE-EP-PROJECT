<template>
    <div class="home">
        <div class="home-header">
            <router-link :to="{name: 'Login'}">
                Entrar
            </router-link>
        </div>

        <typewriter
            class="title-home"
            :speed="200"
            :full-erase="true"
            :interval="300"
            :words='["Incrível", "Divertida!"]'
        >
            A plataforma de streaming mais
        </typewriter>
    </div>
</template>

<script> 
    export default { 

    }
</script>

<style lang="scss" scoped>
    .home { 
        background-color: $white-color;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

        .home-header { 
            position: absolute;
            top: 0;
            width: calc(100% - 10rem);
            padding: 2rem 5rem;
            display: flex;
            justify-content: flex-end;

            a { 
                background-color: $blue5;
                color: $white-color;
                text-decoration: none;
                padding: 0.8rem 2rem;
                border-radius: 4px;
            }
        }

        .title-home { 
            font-size: 60px;
        }

        .typewriter .typewriter-msg { 
            color: $red5;
        }
    }
</style>