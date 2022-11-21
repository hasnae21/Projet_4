class TodoList extends React.Component {
    render() {
        return (
            <ul>
                {this.props.items.map(item => (
                    <li key={item.id}>
                        {item.name}
                    </li>
                ))}
            </ul>
        );
    }
}

class MyForm extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            items: [],
            name: ''
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(e) {
        this.setState({ name: e.target.value });
    }

    handleSubmit = (e) => {
        e.preventDefault();
        const newItem = {
            name: this.state.name,
            id: Date.now()
        };
        this.setState(state => ({
            items: state.items.concat(newItem),
            name: ''
        }));

        console.log(this.state.name)
    }

    render() {
        return (
            <div>
                <form onSubmit={this.handleSubmit}>
                    <input onChange={this.handleChange} value={this.state.name}
                        required />
                </form>
                <TodoList items={this.state.items} />
            </div>
        )
    }
}

const root = ReactDOM.createRoot(document.getElementById('todos-example'));
root.render(<MyForm />);
