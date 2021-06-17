import actions from './actions';
import mutations from './mutations';
import getters from './getters';

const auth = {
    state: {
    },
    namespaced: true,
    mutations,
    actions,
    getters,
}

export default auth