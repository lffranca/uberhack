const DEFAULT_STATE = {};

export default (state = DEFAULT_STATE, action) => {
    switch (action.type) {
        case 'RECEIVE_INFO':
            return { ...state, info: action.payload }
        default:
            return state;
    }
}