import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import {Provider} from 'react-redux';
import { createStore, applyMiddleware, compose } from 'redux';
import ReduxPromise from 'redux-promise';
import reducers from './reducers';
import { receiveInfo } from './actions/SocketActions';
import io from './socket';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose
const store = createStore(reducers, composeEnhancers(
  applyMiddleware(ReduxPromise)
));

io.on('connect', (socket) => console.log('[APP] CONNECT SOCKET', socket));
io.on('receive::info', (data) => store.dispatch(receiveInfo(data)));

class App extends Component {
  render() {
    return <Provider store={store}>
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to React</h1>
        </header>
        <p className="App-intro">
          To get started, edit <code>src/App.js</code> and save to reload.
        </p>
      </div>
    </Provider>;
  }
}

export default App;
