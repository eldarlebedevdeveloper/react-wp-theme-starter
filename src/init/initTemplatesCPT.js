import {render} from '@wordpress/element'
import SingleFood from '../templatesCPT/single/SingleFood'

const rootSingleFood = document.getElementById('app-single-food')
rootSingleFood && render(<SingleFood />, rootSingleFood)