// const GET_API=()=>{
//     fetch("http://127.0.0.1:8000/api/task")
//         .then(response => response.json())
//         // .then(response => this.setState({tasks:response}))
//         .then(json => console.log(json))
//         .catch(error => console.log('ERROR'))
// }
// class App extends React.Component {
//     constructor(props) {
//         super(props);
//         this.state = {tasks:[]};
//     }

//     render() {
//         return (
//             <div>
//                 <h1>_GET_API_</h1>
//                 {/* {this.state.tasks.map(post=><div key={post.id}>{post.name}</div>)} */}
//                 <button onClick={GET_API}>GET API</button>

//             </div>
//         );
//     }
// }

class App extends React.Component {
    state = {
        tasks: [],
        task: ''
    }

    changeData = (e) => {
        this.setState({
            task: e.target.value
        })
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
                <form action="http://127.0.0.1:8000/api/task" method="POST">

                    <input type="text" name="task" onChange={this.changeData} />
                    <input type="submit" value="Ajouter" name="submit" onClick={this.addData} />

                </form>

                <div key={Math.random()}>
                    {this.state.tasks.map(task =>
                        <p>
                            {task.name}
                            <button onClick={() => this.onDelete(task.id)}>Delete</button>
                        </p>
                    )}
                </div>
            </div>
        )
    }

}

const root = ReactDOM.createRoot(document.getElementById('todos-example'));
root.render(<App />);
