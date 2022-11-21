class MyForm extends React.Component {

    constructor(props) {
      super(props);
      this.state = { items: [], name: '' };
      this.handleChange = this.handleChange.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(e) {
        this.setState({ name: e.target.value });
    }

    handleSubmit=(e)=>{
        e.preventDefault();
        console.log('name',this.state.name)

            const newItem = {
                name: this.state.name,
                id: Date.now()
            };
            this.setState(state => ({
                items: state.items.concat(newItem),
                name: ''
            }));
    }

    render() {
        return(
            <div>
            <h1>Entrer une nouvelle tache :</h1>

                <form onSubmit={this.handleSubmit}>

                    <input type="text" name="name" onChange={this.handleChange} value={this.state.name} 
                    />
                    <button> Ajouter # {this.state.items.length + 1} </button>
                    {/* <input type="submit" value="Ajouter" /> */}

                </form>

                <TodoList items={this.state.items} />
                {/* <p> {this.state.name} </p> */}
            </div>
        )
    }

    
}
class TodoList extends React.Component {
    render() {
      return (

        <ul>
          {this.props.items.map(item => (

            <li key={item.id}>{item.name}</li>

          ))}
        </ul>

      );
    }
  }


const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<MyForm />);
