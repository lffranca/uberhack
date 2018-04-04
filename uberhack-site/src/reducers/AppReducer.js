const DEFAULT_STATE = {};

export default (state = DEFAULT_STATE, action) => {
    switch (action.type) {
        // case GET_CIDADES:
        //     return { ...state, cidades: action.payload }
        default:
            return state;
    }
}