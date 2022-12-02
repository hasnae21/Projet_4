const GET_API=()=>{
    fetch("http://127.0.0.1:8000/api/task")
        .then(response => response.json())
        // .then(response => this.setState({tasks:response}))
        .then(json => console.log(json))
        .catch(error => console.log('ERROR'))
}
class GET extends React.Component {
    constructor(props) {
        super(props);
        this.state = {tasks:[]};
    }

    render() {
        return (
            <div>
                <button onClick={GET_API}>GET API</button>
            </div>
        );
    }
}

class App extends React.Component {
    state = {
        tasks: [],
        task: ''
    }

    addData = (e) => {
        e.preventDefault()
        axios.post('http://127.0.0.1:8000/api/task', {
            name: this.state.task
        })
            .then((res) => {
                window.location.reload(false)
            })
    }

    getData = async () => {
        await axios.get('http://127.0.0.1:8000/api/task')
            .then((res => {
                this.setState({
                    tasks: res.data
                })
            }))
    }

    componentDidMount() {
        this.getData()
    }

    onDelete(id) {
        axios.delete(`http://127.0.0.1:8000/api/task/${id}`).then(() => {
            this.getData()
        })
    }

    render() {
        return (
            <div>
                <form>
                    <input type="text" name="task"/>
                    <input type="submit" value="Ajouter" name="submit" onClick={this.addData} />
                </form>
                <div>
                    {this.state.tasks.map(task =>
                        <p key={Math.random()}>
                            {task.name}
                            <button onClick={() => this.onDelete(task.id)}>Delete</button>
                        </p>
                    )}
                </div>
            </div>
        )
    }
}

const root1 = ReactDOM.createRoot(document.getElementById('todos-get'));
root1.render(<GET />);
const root = ReactDOM.createRoot(document.getElementById('todos-example'));
root.render(<App />);