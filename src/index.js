import { render } from '@wordpress/element'

const App = () => {
  console.log('Rendering React component...')
  return <h1>Hello, WordPress + React + JSX!</h1>
}

const root = document.getElementById('app')
if (root) {
  console.log('React root found!')
  render(<App />, root)
} else {
  console.error('No #app element found!')
}
