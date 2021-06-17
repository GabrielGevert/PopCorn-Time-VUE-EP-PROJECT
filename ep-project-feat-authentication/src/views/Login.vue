<template>
    <div class="login">
        <div class="login-container">
            <p class="title"> 
                Login
            </p>

            <input 
                placeholder="E-mail"> 

            <input 
                placeholder="Senha"
            > 

            <div class="container-footer">
                <router-link :to="{name: 'Register'}"> 
                    Cadastre-se 
                </router-link>

                <button class="login-button">
                    Entrar
                </button>
            </div>
        </div>
    </div>
</template>

<script> 
    import {mapActions} from 'vuex'

    export default { 
        data() { 
            return { 
                
            }
        },

        methods: { 

        }
    }
</script>

<style lang="scss" scoped>
    .login { 
        background-color: $white-color;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

        .login-container { 
            padding: 5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 1px solid $grey2;
            height: 25rem;
            width: 25rem;
            border-radius: 8px;

            .title { 
                text-align: left;
                font-size: 24px;
                color: $grey8;
                margin-bottom: 2rem;
            }

            input { 
                background-color: transparent;
                border: 0;
                border-bottom: 1px solid $grey2;
                padding: 1rem;
                outline: none;
                margin-bottom: 2rem;
                font-size: 18px;
                color: $grey8;
            }

            .container-footer { 
                display: flex;
                align-items: center;
                justify-content: space-between;

                a { 
                    cursor: pointer;
                    color: $blue5;
                    font-size: 16px;
                    text-decoration: none;

                    &:hover { 
                        color: $blue3;
                    }
                }

                .login-button { 
                    cursor: pointer;
                    background-color: $blue5;
                    color: $white-color;
                    border: 0;
                    padding: 1rem;
                    border-radius: 8px;
                    width: 40%;
                    font-size: 16px;
                    outline: none;

                    &:hover { 
                        opacity: 0.7;
                    }

                    &:active { 
                        opacity: 1;
                        background-color: $blue9;
                        color: $white-color;
                    }
                }
            }

        }
    }
</style>