import { render } from '@wordpress/element'
import Home from '../templates/Home'

// Templates initialization
const root = document.getElementById('app-home')
root && render(<Home />, root)
