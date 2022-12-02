import './App.css';
import React from 'react';
import Table from './Pages/Table';
import ChartBar from './Pages/Chart';

class App extends React.Component {
  render (){
    return (
      <div  className="App">
        <h1>TodoList</h1>
        <div  className="Donne">
          <div  className="Table">
              <Table/>
          </div>
            
          <ChartBar/>
        </div>
      </div>
    );
  }
}

export default App;

