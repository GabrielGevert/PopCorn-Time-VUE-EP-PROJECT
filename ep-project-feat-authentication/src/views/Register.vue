<template>
    <div class="register">
        <div class="register-container">
            <p class="title"> 
                Registro
            </p>

            <input 
                placeholder="Nome"
                v-model="user.name"
            /> 

            <input 
                placeholder="E-mail"
                v-model="user.email"
                type="email"
            /> 

            <input 
                placeholder="Senha"
                v-model="user.password"
                type="password"
            /> 

            <div class="container-footer">
                <router-link :to="{name: 'Login'}"> 
                    Já tenho conta
                </router-link>

                <button @click="setNewUser(user)" class="login-button">
                    Registrar
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
                user: {
                    name: null,
                    password: null,
                    email: null,
                }
            }
        },

        methods: { 
            ...mapActions('Auth', [
                'setUser'
            ]),

            setNewUser(user) { 
                this.setUser(user).then((data) => { 
                    this.$toast.open({ 
                        message: data.success
                    })
                }).catch((data) => { 
                    this.$toast.open({
                        type: 'error', 
                        message: data.error
                    })
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .register { 
        background-color: $white-color;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

        .register-container { 
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