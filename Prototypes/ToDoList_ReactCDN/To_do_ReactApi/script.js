const GET_API=()=>{
    fetch("http://127.0.0.1:8000/api/task")
        .then(response => response.json())
        // .then(response => this.setState({tasks:response}))
        .then(json => console.log(json))
        .catch(error => console.log('ERROR'))
}

class MyForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {tasks:[]};
    }
    
    render() {
        return (
            <div>
                <h1>_GET_API_</h1>
                {/* {this.state.tasks.map(post=><div key={post.id}>{post.name}</div>)} */}
                <button onClick={GET_API}>GET API</button>

            </div>
        );
    }
}

const root = ReactDOM.createRoot(document.getElementById('todos-example'));
root.render(<MyForm />);


