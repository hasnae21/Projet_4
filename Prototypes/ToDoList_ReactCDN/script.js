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
                <form onSubmit={this.handleSubmit}>

                    <input type="text" name="name" onChange={this.handleChange} value={this.state.name} 
                    />
                    <button> Ajouter # {this.state.items.length + 1} </button>
                    {/* <input type="submit" value="Ajouter" /> */}

                </form>
                <TodoList items={this.state.items} />
            </div>
        )
    }
  }


const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<MyForm />);
