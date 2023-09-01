const Keyboard = window.SimpleKeyboard.default

let selectedInput

let keyboard = new Keyboard({
  onChange: input => onChange(input),
  onKeyPress: button => onKeyPress(button),
  layout: {
    default: [
      '1 2 3 4 5 6 7 8 9 0 {backspace}',
      'Q w e r t y u i o p',
      'a s d f g h j k l',
      'z x c v b n m . _',
      '.com @ {space}'
    ],
    shift: [
      '! # $ % & * ( ) _ + {backspace}',
      'Q W E R T Y U I O P { } |',
      'A S D F G H J K L Ç : "',
      '{shift} Z X C V B N M < > ? {shift}',
      '.com @ {space}'
    ]
  }
})

document.querySelectorAll('.input').forEach(input => {
  input.addEventListener('focus', onInputFocus)
  input.addEventListener('input', onInputChange)
})

function onInputFocus (event) {
  selectedInput = `#${event.target.id}`

  keyboard.setOptions({
    inputName: event.target.id
  })
}

function onInputChange (event) {
  keyboard.setInput(event.target.value, event.target.id)
}

function onChange (input) {
  document.querySelector(selectedInput || '.input').value = input
}

function onKeyPress (button) {
  if (button === '{lock}' || button === '{shift}') handleShiftButton()
}

function handleShiftButton () {
  let currentLayout = keyboard.options.layoutName
  let shiftToggle = currentLayout === 'default' ? 'shift' : 'default'

  keyboard.setOptions({
    layoutName: shiftToggle
  })
}
