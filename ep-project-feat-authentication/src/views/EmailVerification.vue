<template>
    <div class="email-verification">
        <p class="title"> Tudo certo com a validação! </p>
        <p class="description"> 
            Você provou que você é você mesmo. Continue acessando a plataforma 
            e se divirta com os filmes e séries mais recentes .
        </p>

        <router-link :to="{name: 'Login'}">
            Continuar acessando
        </router-link>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {
        props: ['token'],
        
        created() { 
            this.verifyEmail()
        },

        methods: { 
            ...mapActions("Auth", [
                "emailVerification"
            ]),

            verifyEmail() { 
                let data = { 
                    token: this.token
                }

                this.emailVerification(data).then(() => {
                    console.log('Deu boa')
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .email-verification { 
        text-align: center;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        .title { 
            font-size: 30px;
            color: $grey8;
            margin-bottom: 2rem;
        }

        .description { 
            max-width: 50%;
            font-size: 24px;
            color: $grey6;
            margin-bottom: 2rem;
        }

        a { 
            text-decoration: none;
            border-radius: 4px;
            background-color: $blue5;
            padding: 0.8rem 2rem;
            cursor: pointer;
            color: $white-color;
        }
    }
</style>