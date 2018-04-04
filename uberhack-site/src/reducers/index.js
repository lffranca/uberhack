import { combineReducers } from 'redux';
import AppReducer from './AppReducer';
import SocketReducer from './SocketReducer';

export default combineReducers({
    App: AppReducer,
    Socket: SocketReducer,
});