import './App.css';
import React from 'react';
import Todolist from './compenent/Todolist';

class App extends React.Component{
  render(){
    return(
      <div className='App-header'>
        <h1>Todolist</h1>
        <Todolist/>
      </div>
    );
  }
}

export default App;

