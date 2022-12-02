import logo from './logo.svg';
import './App.css';
import React from 'react';
import Table from './Pages/Table';

class App extends React.Component {
  render (){
    return (
      <div  className="App">
        <h1>TodoList</h1>
        <Table/>
      </div>
    );
  }
}

export default App;
