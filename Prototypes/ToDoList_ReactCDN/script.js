// class MyForm extends React.Component {

//     constructor(props) {
//         super(props)
//         this.state ={
//              name: '' 
//         }
//     }

//     handleSubmit=(e)=>{
//         e.preventDefault();
//         console.log('name',this.state.name)
//     }

//     render() {
//         return(
//             <div>
//             <h1>Entrer une nouvelle tache :</h1>

//                 <form onSubmit={(e)=>{this.handleSubmit(e)}}>
//                     <input type="text" name="name" value={this.state.name} 
//                         onChange={(e)=>{this.setState({[e.target.name]:e.target.value})}}/>
//                     <input type="submit" value="Ajouter" />
//                 </form>
                
//                 {/* <p> {this.state.name} </p> */}
//             </div>
//         )
//     }
// }

// const root = ReactDOM.createRoot(document.getElementById('root'));
// root.render(<MyForm />);

class TodoApp extends React.Component {
    constructor(props) {
      super(props);
      this.state = { items: [], text: '' };
      this.handleChange = this.handleChange.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
    }
  
    render() {
      return (
        <div>
          <TodoList items={this.state.items} />

          <form onSubmit={this.handleSubmit}>

            <label htmlFor="new-todo">
              What needs to be done? 
            </label>

            <input
              id="new-todo"
              onChange={this.handleChange}
              value={this.state.text}
            />

            <button> Ajouter
              {/* Add #{this.state.items.length + 1} */}
            </button>
          </form>

        </div>
      );
    }
  
    handleChange(e) {
      this.setState({ text: e.target.value });
    }
  
    handleSubmit(e) {
      e.preventDefault();
      if (this.state.text.length === 0) {
        return;
      }
      const newItem = {
        text: this.state.text,
        id: Date.now()
      };
      this.setState(state => ({
        items: state.items.concat(newItem),
        text: ''
      }));
    }
  }
  
  class TodoList extends React.Component {
    render() {
      return (

        <ul>
          {this.props.items.map(item => (

            <li key={item.id}>{item.text}</li>

          ))}
        </ul>

      );
    }
  }
  
ReactDOM.render(<TodoApp />,document.getElementById('todos-example'));