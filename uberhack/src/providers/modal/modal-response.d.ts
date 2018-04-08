interface ModalResponse {
  id: number,
  label: string,
  modal_lines?: Array<ModalLineResponse>,
  modal_problems?: Array<ModalProblemResponse>,
}