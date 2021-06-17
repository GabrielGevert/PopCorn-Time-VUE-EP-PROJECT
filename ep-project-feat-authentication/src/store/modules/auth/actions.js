import axios from 'axios'

export default { 
    getUser: ({state, commit}, payload) => {
        return new Promise((resolve, reject) => {
            axios.get('http://netflix.test/api/user', payload,
            ).then(({data}) => {
                resolve(data)
            }).catch(({response}) => {
                reject()
            })
        })
    },

    setUser: ({state, commit}, payload) => { 
        return new Promise((resolve, reject) => { 
            axios.post('http://netflix.test/api/user/setUser', payload,
            ).then(({data}) => {
                if (data.error) { 
                    reject(data)
                }

                if (data.success) { 
                    resolve(data)
                }
            })
        })
    }, 

    emailVerification: ({state, commit}, payload) => { 
        return new Promise((resolve, reject) => { 
            axios.post('http://netflix.test/api/user/validateEmail', payload,
            ).then(({data}) => {
                if (data.error) { 
                    reject(data)
                }

                if (data.success) { 
                    resolve(data)
                }
            })
        })
    }
}